<?php

use App\Jobs\ProcessImage;
use App\Livewire\Admin\Client\ClientMessages;
use App\Livewire\Admin\Client\ClientProduct;
use App\Models\Account;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    Role::factory()->createMany([
        ['id' => Role::ADMIN, 'role' => 'admin'],
        ['id' => Role::MERCHANT, 'role' => 'merchant'],
        ['id' => Role::CLIENT, 'role' => 'client'],
        ['id' => Role::WAREHOUSE, 'role' => 'warehouse'],
    ]);
    Status::factory()->createMany([
        ['id' => Status::ACTIVE, 'status' => 'active'],
        ['id' => Status::INACTIVE, 'status' => 'inactive'],
    ]);
    MessageStatus::factory()->createMany([
        ['id' => MessageStatus::VALID, 'status' => 'valid'],
        ['id' => MessageStatus::UNREAD, 'status' => 'unread'],
        ['id' => MessageStatus::UNVALID, 'status' => 'unvalid'],
    ]);
});
it('create a new product', function () {
    Storage::fake('public');
    Queue::fake();
    $user = User::factory()->create();
    Account::factory()->create([
        'id' => $user->id,
        'user_id' => $user->id,
        'role_id' => Role::MERCHANT
    ]);
    $category = ProductCategory::factory()->create(['name' => 'Bières artisanales', 'slug' => Str::slug('Bières artisanales'), 'capacity' => 200, 'tax' => 21]);

    $fakeImage = UploadedFile::fake()->image('product.jpg');

    Livewire::actingAs($user)
        ->test(ClientProduct::class)
        ->set('form.name', 'Baguette')
        ->set('form.description', 'Baguette de pain française')
        ->set('form.category_id', $category->id)
        ->set('form.price', 100)
        ->set('form.is_active', 1)
        ->set('form.picture_path', $fakeImage)
        ->call('create');

    $this->assertDatabaseHas('products', [
        'name' => 'Baguette',
        'product_category_id' => $category->id,
    ]);
    Queue::assertPushed(ProcessImage::class);
});
it('fails to create a new product', function () {
    $user = User::factory()->create();
    Account::factory()->create([
        'user_id' => $user->id,
        'role_id' => Role::MERCHANT
    ]);

    Livewire::actingAs($user)
        ->test(ClientProduct::class)
        ->set('form.name', '')
        ->set('form.description', '')
        ->set('form.category_id','' )
        ->set('form.price', '')
        ->set('form.is_active', '')
        ->set('form.picture_path', '')
        ->call('create')
        ->assertHasErrors(['form.name', 'form.description', 'form.category_id', 'form.price','form.picture_path']);

    expect(Product::count())->toBe(0);

});


it('send a message to an Admin', function () {
    $userSender = User::factory()->create();
    $userRecipient = User::factory()->create();
    Account::factory()->create([
        'user_id' => $userSender->id,
        'role_id' => Role::MERCHANT
    ]);
    $recipient = Account::factory()->create([
        'user_id' => $userRecipient->id,
        'role_id' => Role::ADMIN
    ]);
    Livewire::actingAs($userSender)
        ->test(ClientMessages::class)
        ->set('form.title', 'Bonjour')
        ->set('form.description', 'Bonjour')
        ->set('form.recipient_id', $recipient->id)
        ->set('form.status_id', MessageStatus::UNREAD)
        ->call('create');

    expect(Message::where('title', 'Bonjour')->exists())->toBeTrue();
});

it('fails to send a message to an Admin', function () {
    $userSender = User::factory()->create();
    $userRecipient = User::factory()->create();
    Account::factory()->create([
        'user_id' => $userSender->id,
        'role_id' => Role::MERCHANT
    ]);
    Account::factory()->create([
        'user_id' => $userRecipient->id,
        'role_id' => Role::ADMIN
    ]);
    Livewire::actingAs($userSender)
        ->test(ClientMessages::class)
        ->set('form.title', '')
        ->set('form.description', '')
        ->set('form.recipient_id', '')
        ->set('form.status_id', '')
        ->call('create')
        ->assertHasErrors(['form.title', 'form.description', 'form.recipient_id', 'form.status_id']);

    expect(Message::count())->toBe(0);
});
