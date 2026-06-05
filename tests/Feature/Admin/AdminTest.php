<?php

use App\Livewire\Admin\Admin\Merchants;
use App\Livewire\Admin\Admin\Messages;
use App\Models\Account;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
it('creates a merchant successfully', function () {
    Livewire::test(Merchants::class)
        ->set('form.name', 'JohnCorp')
        ->set('form.firstname', 'John')
        ->set('form.lastname', 'Doe')
        ->set('form.description', 'Entreprise de vente de produit décoratif')
        ->set('form.status_id', Status::ACTIVE)
        ->set('form.postal_code', 4160)
        ->set('form.address', 'Rue du viognier')
        ->set('form.country', 'BE')
        ->set('form.email', 'john@example.com')
        ->call('create');

    expect(User::where('email', 'john@example.com')->exists())->toBeTrue();
});

it('fails to create a merchant with invalid data', function () {
    Livewire::test(Merchants::class)
        ->set('form.name', '')
        ->set('form.firstname', '')
        ->set('form.lastname', '')
        ->set('form.email', 'not-an-email')
        ->set('form.status_id', null)
        ->set('form.postal_code', null)
        ->set('form.address', '')
        ->set('form.country', null)
        ->call('create')
        ->assertHasErrors(['form.name', 'form.firstname', 'form.lastname', 'form.email']);

    expect(User::count())->toBe(0);
});

it('send a message to an Merchant', function () {
    $userSender = User::factory()->create();
    $userRecipient = User::factory()->create();
    Account::factory()->create([
        'user_id' => $userSender->id,
        'role_id' => Role::ADMIN
    ]);
    $recipient = Account::factory()->create([
        'user_id' => $userRecipient->id,
        'role_id' => Role::MERCHANT
    ]);
    Livewire::actingAs($userSender)
        ->test(Messages::class)
        ->set('form.title', 'Bonjour')
        ->set('form.description', 'Bonjour')
        ->set('form.recipient_id', $recipient->id)
        ->set('form.status_id', MessageStatus::UNREAD)
        ->call('create');

    expect(Message::where('title', 'Bonjour')->exists())->toBeTrue();
});

it('fails to send a message to an Merchant', function () {
    $userSender = User::factory()->create();
    Account::factory()->create([
        'user_id' => $userSender->id,
        'role_id' => Role::ADMIN
    ]);
    Livewire::actingAs($userSender)
        ->test(Messages::class)
        ->set('form.title', '')
        ->set('form.description', '')
        ->set('form.recipient_id', '')
        ->set('form.status_id', '')
        ->call('create')
        ->assertHasErrors(['form.title', 'form.description', 'form.recipient_id', 'form.status_id']);

    expect(Message::count())->toBe(0);

});
