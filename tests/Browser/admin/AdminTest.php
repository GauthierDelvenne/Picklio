<?php

use App\Models\Account;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Stock;
use App\Models\StockStatus;
use App\Models\User;
use Laravel\Dusk\Browser;

it('test searchbar for a product from the admin', function () {
    $adminUser = User::factory()->create();
    $account = Account::factory()->create(['user_id' => $adminUser->id, 'role_id' => Role::ADMIN]);
    $product = Product::factory()->create(['account_id' => $account->id, 'is_active' => 1]);
    Stock::factory()->create(['product_id' => $product->id, 'quantity' => 1, 'stock_status_id' => StockStatus::VERYLOW]);

    $this->browse(function (Browser $browser) use ($adminUser, $product) {
        $browser->loginAs($adminUser)
            ->visit(route('admin.stock.index'))
            ->waitFor('input[placeholder="Rechercher"]')
            ->type('input[placeholder="Rechercher"]', $product->name)
            ->waitForText($product->name)
            ->assertSee($product->name);
    });
});
it('test status filter for a product from the admin', function () {
    $adminUser = User::factory()->create();
    $account = Account::factory()->create(['user_id' => $adminUser->id, 'role_id' => Role::ADMIN]);
    $product = Product::factory()->create(['account_id' => $account->id, 'is_active' => 1]);
    Stock::factory()->create(['product_id' => $product->id, 'quantity' => 1, 'stock_status_id' => StockStatus::VERYLOW]);

    $this->browse(function (Browser $browser) use ($adminUser, $product) {
        $browser->loginAs($adminUser)
            ->visit(route('admin.stock.index'))
            ->waitFor('select[name="statu"]')
            ->select('select[name="statu"]', StockStatus::VERYLOW)
            ->waitForText($product->name)
            ->assertSee($product->name);
    });
});
it('test category filter for a product from the admin', function () {
    $adminUser = User::factory()->create();
    $account = Account::factory()->create(['user_id' => $adminUser->id, 'role_id' => Role::ADMIN]);
    $category = ProductCategory::find(1);
    $product = Product::factory()->create(['account_id' => $account->id, 'is_active' => 1, 'product_category_id' => $category->id]);
    Stock::factory()->create(['product_id' => $product->id, 'quantity' => 1, 'stock_status_id' => StockStatus::VERYLOW]);

    $this->browse(function (Browser $browser) use ($adminUser, $product, $category) {
        $browser->loginAs($adminUser)
            ->visit(route('admin.stock.index'))
            ->waitFor('select[name="category"]')
            ->select('select[name="category"]', $category->id)
            ->waitForText($product->name)
            ->assertSee($product->name);
    });
});
it('test change site button redirects to front home from the admin', function () {
    $adminUser = User::factory()->create();
    Account::factory()->create(['user_id' => $adminUser->id, 'role_id' => Role::ADMIN]);

    $this->browse(function (Browser $browser) use ($adminUser) {
        $browser->loginAs($adminUser)
            ->visit(route('admin.merchant.index'))
            ->waitForText('Changer de site')
            ->click('button.w-full')
            ->waitForText('Mini-site')
            ->clickLink('Mini-site')
            ->assertRouteIs('front.home');
    });
});
it('test theme toggle on settings page', function () {
    $adminUser = User::factory()->create();
    Account::factory()->create(['user_id' => $adminUser->id, 'role_id' => Role::ADMIN]);

    $this->browse(function (Browser $browser) use ($adminUser) {
        $browser->loginAs($adminUser)
            ->visit(route('admin.settings'))
            ->waitFor('ui-radio-group')
            ->assertAttribute('ui-radio[value="system"]', 'aria-checked', 'true')
            ->assertAttribute('ui-radio[value="light"]', 'aria-checked', 'false')
            ->assertAttribute('ui-radio[value="dark"]', 'aria-checked', 'false')
            ->click('ui-radio[value="light"]')
            ->pause(300)
            ->assertAttribute('ui-radio[value="light"]', 'aria-checked', 'true')
            ->assertAttribute('ui-radio[value="system"]', 'aria-checked', 'false');
    });
});
