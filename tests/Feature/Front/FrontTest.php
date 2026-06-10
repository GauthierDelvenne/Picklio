<?php

use App\Livewire\Front\Components\ShopCard;
use App\Livewire\Front\Contact;
use App\Models\Account;
use App\Models\ContactMessage;
use App\Models\MessageStatus;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PickupSlot;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Stock;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    Role::factory()->createMany([
        ['id' => Role::ADMIN, 'role' => 'admin'],
        ['id' => Role::MERCHANT, 'role' => 'merchant'],
        ['id' => Role::CLIENT, 'role' => 'client'],
        ['id' => Role::WAREHOUSE, 'role' => 'warehouse'],
    ]);
    MessageStatus::factory()->createMany([
        ['id' => MessageStatus::VALID, 'status' => 'valid'],
        ['id' => MessageStatus::UNREAD, 'status' => 'unread'],
        ['id' => MessageStatus::UNVALID, 'status' => 'unvalid'],
    ]);
    PickupSlot::factory()->create([
        'id' => PickupSlot::TIMECREATEDCART,
        'day_iso' => 1,
        'time' => '00:00:00',
        'max_orders' => '2',
        'is_active' => true,
    ]);
});

it('adds a product to the cart and creates an order', function () {
    $user = User::factory()->create();
    $clientAccount = Account::factory()->create([
        'user_id' => $user->id,
        'role_id' => Role::CLIENT
    ]);

    $merchantUser = User::factory()->create();
    $merchantAccount = Account::factory()->create([
        'user_id' => $merchantUser->id,
        'role_id' => Role::MERCHANT
    ]);

    $category = ProductCategory::factory()->create([
        'name' => 'Bières artisanales',
        'slug' => Str::slug('Bières artisanales'),
        'capacity' => 200,
        'tax' => 21
    ]);

    $product = Product::factory()->create([
        'account_id' => $merchantAccount->id,
        'product_category_id' => $category->id,
        'name' => 'Bière',
        'description' => 'Bière artisanale',
        'price' => 500,
        'picture_path' => 'images/product.jpg',
        'is_active' => true,
    ]);

    $stock = Stock::factory()->create([
        'product_id' => $product->id,
        'quantity' => 10,
        'quantity_reserved' => 0,
        'stock_status_id' => true
    ]);

    Livewire::actingAs($user)
        ->test(ShopCard::class, [
            'price' => $product->price,
            'product' => $product,
            'card' => true
        ])
        ->set('quantity', 2)
        ->call('addToCart')
        ->assertDispatched('add-product');

    $this->assertDatabaseHas('orders', [
        'account_id' => $clientAccount->id,
        'pickup_slot_id' => PickupSlot::TIMECREATEDCART,
        'order_status_id' => OrderStatus::INIT,
        'total_price' => 1000
    ]);

    $this->assertDatabaseHas('order_items', [
        'product_id' => $product->id,
        'account_id' => $clientAccount->id,
        'merchant_id' => $merchantAccount->id,
        'quantity' => 2,
        'price' => 1000
    ]);

    expect($stock->fresh()->quantity_reserved)->toBe(2);
});

it('can increment and decrement product quantity from the shop card', function () {
    $user = User::factory()->create();
    Account::factory()->create(['user_id' => $user->id, 'role_id' => Role::CLIENT]);

    $merchantUser = User::factory()->create();
    $merchantAccount = Account::factory()->create(['user_id' => $merchantUser->id, 'role_id' => Role::MERCHANT]);

    $category = ProductCategory::factory()->create(['name' => 'Pain', 'slug' => 'pain', 'capacity' => 100, 'tax' => 6]);

    $product = Product::factory()->create([
        'account_id' => $merchantAccount->id,
        'product_category_id' => $category->id,
        'name' => 'Baguette',
        'description' => 'Pain traditionnel',
        'price' => 150,
        'picture_path' => 'images/baguette.jpg',
        'is_active' => true
    ]);

    Stock::factory()->create([
        'product_id' => $product->id,
        'quantity' => 5,
        'quantity_reserved' => 0,
        'stock_status_id' => true
    ]);

    $component = Livewire::actingAs($user)
        ->test(ShopCard::class, [
            'price' => $product->price,
            'product' => $product,
            'card' => true
        ]);

    $component->call('addToCart');
    expect($component->get('quantity'))->toBe(1);

    $component->call('increment')
        ->assertDispatched('edit-product');
    expect($component->get('quantity'))->toBe(2);

    $component->call('decrement')
        ->assertDispatched('edit-product');
    expect($component->get('quantity'))->toBe(1);
});

it('send a Contact form successfully', function () {
    Warehouse::factory()->create([
        'name' => 'A',
        'address' => '123 Rue de l’Entrepôt',
        'postal_code' => '75000',
        'country' => 'BE',
    ]);
    $recipient = User::factory()->create();
    Account::factory()->create([
        'user_id' => $recipient->id,
        'role_id' => Role::ADMIN,
    ]);
    Livewire::test(Contact::class)
        ->set('form.name', 'John Doe')
        ->set('form.email', 'john@example.com')
        ->set('form.phone', '049777777')
        ->set('form.message_status_id', MessageStatus::UNREAD)
        ->set('form.title', 'Un problème dans ma commande')
        ->set('form.description', 'J’ai eu une tomate sas raison')
        ->call('sendForm');

    expect(ContactMessage::where('title', 'Un problème dans ma commande')->exists())->toBeTrue();
});
