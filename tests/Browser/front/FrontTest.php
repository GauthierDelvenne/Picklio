<?php

use App\Models\Account;
use App\Models\Product;
use App\Models\Role;
use App\Models\Stock;
use App\Models\StockStatus;
use App\Models\User;
use Laravel\Dusk\Browser;

it('can interact with the merchant accordion', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit(route('front.merchant'))
            ->waitFor('.accordionItem:nth-of-type(1) .accordionItem__contentContainer')
            ->assertMissing('.accordionItem:nth-of-type(2) .accordionItem__contentContainer')
            ->click('.accordionItem:nth-of-type(2) .accordionItem__titleContainer__title')
            ->pause(300)
            ->assertVisible('.accordionItem:nth-of-type(2) .accordionItem__contentContainer')
            ->assertMissing('.accordionItem:nth-of-type(1) .accordionItem__contentContainer');
    });
});

it('redirects to the correct category page when clicked', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit(route('front.home'))
            ->waitFor('.productCategoryCard')
            ->click('.productCategoryCard')
            ->pause(500)
            ->assertPathContains('catalogue');
    });
});

it('navigates to the basket page when clicked', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit(route('front.catalogue.index'))
            ->waitFor('.catalogue__cart__link')
            ->press('Accepter') // À cause cookie-consent
            ->pause(200)
            ->click('.catalogue__cart__link')
            ->pause(300)
            ->assertPathContains('panier');
    });
});
it('has a functional anchor button to the form section', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit(route('front.merchant'))
            ->waitFor('.merchant__merchantContainer__contentContainer__button')
            ->click('.merchant__merchantContainer__contentContainer__button')
            ->pause(200)
            ->assertScript('window.location.hash', '#form');
    });
});
it('has a functional telephone link', function () {
    $this->browse(function (Browser $browser) {
        $url = route('front.contact');

        $browser->visit($url)
            ->waitFor('a[href="tel:+32497546943"]')
            ->assertAttribute('a[href="tel:+32497546943"]', 'href', 'tel:+32497546943');
    });
});

it('logs out the user when clicking the disconnect button', function () {
    $user = User::factory()->create();
    Account::factory()->create(['user_id' => $user->id, 'role_id' => Role::CLIENT]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
            ->visit(route('front.profil'))
            ->waitFor('.profil__account__buttonContainer')
            ->click('[wire\\:click="logout"]')
            ->pause(500)
            ->assertGuest();
    });
});
it('delete the user when clicking the delete button', function () {
    $user = User::factory()->create();
    Account::factory()->create(['user_id' => $user->id, 'role_id' => Role::CLIENT]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
            ->visit(route('front.profil'))
            ->waitFor('.profil__account__buttonContainer')
            ->click('.profil__account__buttonContainer .button--danger')
            ->pause(500)
            ->click('[wire\\:click="delete"]')
            ->pause(500)
            ->assertGuest();
    });
});
it('adds a product to the cart', function () {
    $user = User::factory()->create();
    $account = Account::factory()->create(['user_id' => $user->id, 'role_id' => Role::CLIENT]);
    $product = Product::factory()->create(['account_id' => $account->id]);
    Stock::factory()->create(['product_id' => $product->id, 'quantity' => 1, 'stock_status_id' => StockStatus::VERYLOW]);
    $this->browse(function (Browser $browser) use ($product, $user) {
        $browser->loginAs($user)
            ->visit(route('front.catalogue.show', $product->id))
            ->waitFor('.shopCard__buttonContainer__button')
            ->click('.shopCard__buttonContainer__button')
            ->pause(500)
            ->assertSee(1);
    });
});
