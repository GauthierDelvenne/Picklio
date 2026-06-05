<?php

use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Mail\RegisterMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

beforeEach(function () {
    Role::factory()->createMany([
        ['id' => Role::ADMIN, 'role' => 'admin'],
        ['id' => Role::MERCHANT, 'role' => 'merchant'],
        ['id' => Role::CLIENT, 'role' => 'client'],
        ['id' => Role::WAREHOUSE, 'role' => 'warehouse'],
    ]);
});

it('authenticates a user', function () {
    $user = User::factory()->create([
        'password' => Hash::make('Password'),
    ]);
    $this->actingAs($user);
    $this->assertAuthenticatedAs($user);
});

it('registers a user successfully', function () {
    Mail::fake();

    Livewire::test(Register::class)
        ->set('form.firstname', 'John')
        ->set('form.lastname', 'Doe')
        ->set('form.email', 'john@example.com')
        ->set('form.password', 'Password')
        ->set('form.role', Role::CLIENT)
        ->call('register')
        ->assertRedirect();

    expect(User::where('email', 'john@example.com')->exists())->toBeTrue();
    Mail::assertSent(RegisterMail::class);
});
it('fails to register with invalid data', function () {
    Mail::fake();

    Livewire::test(Register::class)
        ->set('form.firstname', '')
        ->set('form.lastname', '')
        ->set('form.email', 'not-an-email')
        ->set('form.password', '123')
        ->call('register')
        ->assertHasErrors(['form.firstname', 'form.lastname', 'form.email', 'form.password']);

    expect(User::count())->toBe(0);
    Mail::assertNothingSent();
});
it('logs out an authenticated user', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->assertAuthenticatedAs($user);

    Livewire::test(Logout::class)
        ->call('logout')
        ->assertRedirect(route('auth.login'));
    $this->assertGuest();
});
