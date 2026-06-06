<?php

use App\Models\Account;
use App\Models\Role;
use App\Models\User;
use Laravel\Dusk\Browser;

it('test password visibility toggle on login page', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit(route('auth.login'))
            ->assertAttribute('input[name="password"]', 'type', 'password')
            ->click('svg[name="eye"]')
            ->assertAttribute('input[name="password"]', 'type', 'text')
            ->click('svg[name="eye-slash"]')
            ->assertAttribute('input[name="password"]', 'type', 'password');
    });
});
it('test logout from the client sidebar', function () {
    $user = User::factory()->create();
    Account::factory()->create(['user_id' => $user->id, 'role_id' => Role::MERCHANT]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
            ->visit(route('client.dashboard'))
            ->waitForText('Changer de site')
            ->click('button.w-full')
            ->waitForText('Se déconnecter')
            ->click('[wire\\:click="logout"]')
            ->pause(500)
            ->assertRouteIs('auth.login');
    });
});
