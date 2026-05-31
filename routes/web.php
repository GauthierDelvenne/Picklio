<?php

use App\Livewire\Admin\Admin\ContactMessage;
use App\Livewire\Admin\Admin\Dashboard;
use App\Livewire\Admin\Admin\Merchant;
use App\Livewire\Admin\Admin\Merchants;
use App\Livewire\Admin\Admin\Message;
use App\Livewire\Admin\Admin\Messages;
use App\Livewire\Admin\Admin\NewMerchantMessage;
use App\Livewire\Admin\Admin\Order;
use App\Livewire\Admin\Admin\Orders;
use App\Livewire\Admin\Admin\ReceiveMessage;
use App\Livewire\Admin\Admin\Settings;
use App\Livewire\Admin\Admin\Statistics;
use App\Livewire\Admin\Admin\Stock;
use App\Livewire\Admin\Admin\Stocks;
use App\Livewire\Admin\Admin\SuggestMessage;
use App\Livewire\Admin\Client\ClientDashboard;
use App\Livewire\Admin\Client\ClientMessage;
use App\Livewire\Admin\Client\ClientMessages;
use App\Livewire\Admin\Client\ClientReceiveMessage;
use App\Livewire\Admin\Client\ClientSettings;
use App\Livewire\Admin\Client\ClientStatistics;
use App\Livewire\Admin\Client\ClientStock;
use App\Livewire\Admin\Client\ClientStocks;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Password\ForgetPassword;
use App\Livewire\Auth\Password\ResetPassword;
use App\Livewire\Auth\Register;
use App\Livewire\Front\Basket;
use App\Livewire\Front\Catalogue;
use App\Livewire\Front\Catalogues;
use App\Livewire\Front\Contact;
use App\Livewire\Front\FrontMerchant;
use App\Livewire\Front\FrontOrder;
use App\Livewire\Front\FrontOrders;
use App\Livewire\Front\Home;
use App\Livewire\Front\LegalNotice;
use App\Livewire\Front\OrderConfirmation;
use App\Livewire\Front\PrivacyPolicy;
use App\Livewire\Front\Profil;
use App\Livewire\Front\Slot;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/** Route commence par la langue/ **/
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize']], function () {
        /**
         * Gestion de l'url de reload en fonction de la localisation
         */
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        /** LOGIN */
        Route::get(__('route.auth.login'), Login::class)->name('auth.login');
        Route::get(__('route.auth.register'), Register::class)->name('auth.register');
        Route::get(__('route.auth.password.forget-password'), ForgetPassword::class)->name('auth.password.forget-password');
        Route::get(__('route.auth.password.reset-password').'/{token}', ResetPassword::class)->name('auth.password.reset-password');
        Route::get(__('route.auth.logout'), Logout::class)->name('auth.logout');

        Route::post(__('route.auth.logout'), function (Request $request) {})->name('auth.logout');

        /** ADMIN */
        Route::group(['prefix' => __('route.admin.admin.prefix'), 'middleware' => ['ifRoleAdmin']], function () {
            Route::get(__('route.admin.admin.dashboard'), Dashboard::class)->name('admin.dashboard');
            Route::group(['prefix' => __('route.admin.admin.orders')],
                function () {
                    Route::get('/', Orders::class)->name('admin.order.index');
                    Route::get('{order}', Order::class)->name('admin.order.show');
                }
            );
            Route::group(['prefix' => __('route.admin.admin.merchants')],
                function () {
                    Route::get('/', Merchants::class)->name('admin.merchant.index');
                    Route::get('{merchant}', Merchant::class)->name('admin.merchant.show');
                }
            );
            Route::group(['prefix' => __('route.admin.admin.stocks')],
                function () {
                    Route::get('/', Stocks::class)->name('admin.stock.index');
                    Route::get('{product}', Stock::class)->name('admin.stock.show');
                }
            );
            Route::group(['prefix' => __('route.admin.admin.messages')],
                function () {
                    Route::get('/', Messages::class)->name('admin.message.index');
                    Route::get(__('route.admin.admin.suggestMessage').'/{suggestMessage}', SuggestMessage::class)->name('admin.message.suggest.show');
                    Route::get(__('route.admin.admin.receiveMessage').'/{receiveMessage}', ReceiveMessage::class)->name('admin.message.receive.show');
                    Route::get(__('route.admin.admin.newMerchantMessage').'/{newMerchantMessage}', NewMerchantMessage::class)->name('admin.message.new-merchant.show');
                    Route::get(__('route.admin.admin.contactMessage').'/{contactMessage}', ContactMessage::class)->name('admin.message.contact.show');
                    Route::get('{message}', Message::class)->name('admin.message.show');
                }
            );
            Route::get(__('route.admin.admin.statistics'), Statistics::class)->name('admin.statistics');
            Route::get(__('route.admin.admin.settings'), Settings::class)->name('admin.settings');
        });

        /** CLIENTS */
        Route::group(['prefix' => __('route.admin.client.prefix'), 'middleware' => ['ifRoleMerchant']], function () {
            Route::get(__('route.admin.client.dashboard'), ClientDashboard::class)->name('client.dashboard');
            Route::group(['prefix' => __('route.admin.admin.stocks')],
                function () {
                    Route::get('/', ClientStocks::class)->name('client.stock.index');
                    Route::get('{product}', ClientStock::class)->name('client.stock.show');
                }
            );
            Route::group(['prefix' => __('route.admin.client.messages')],
                function () {
                    Route::get('/', ClientMessages::class)->name('client.message.index');
                    Route::get(__('route.admin.client.receiveMessage').'/{receiveMessage}', ClientReceiveMessage::class)->name('client.message.receive.show');
                    Route::get(__('route.admin.admin.contactMessage').'/{contactMessage}', ContactMessage::class)->name('client.message.contact.show');
                    Route::get('{message}', ClientMessage::class)->name('client.message.show');
                }
            );
            Route::get(__('route.admin.client.statistics'), ClientStatistics::class)->name('client.statistics');
            Route::get(__('route.admin.client.settings'), ClientSettings::class)->name('client.settings');
        });

        /** SITE WEB */
        Route::get(__('route.front.home'), Home::class)->name('front.home');
        Route::group(['prefix' => __('route.front.catalogue')],
            function () {
                Route::get('/', Catalogues::class)->name('front.catalogue.index');
                Route::get('{product}', Catalogue::class)->name('front.catalogue.show');
            }
        );
        Route::get(__('route.front.merchant'), FrontMerchant::class)->name('front.merchant');
        Route::get(__('route.front.basket'), Basket::class)->name('front.basket');
        Route::get(__('route.front.order').'/{order}', FrontOrder::class)->name('front.order.show');
        Route::get(__('route.front.slot').'/{order}', Slot::class)->name('front.slot');
        Route::get(__('route.front.order-confirmation').'/{order}', OrderConfirmation::class)->name('front.order-confirmation');
        Route::get(__('route.front.profil'), Profil::class)->name('front.profil');
        Route::get(__('route.front.order'), FrontOrders::class)->name('front.order.index');
        Route::get(__('route.front.legal-notice'), LegalNotice::class)->name('front.legal-notice');
        Route::get(__('route.front.privacy-policy'), PrivacyPolicy::class)->name('front.privacy-policy');
        Route::get(__('route.front.contact'), Contact::class)->name('front.contact');

    });
Route::get('/', function () {
    return redirect()->to(LaravelLocalization::localizeUrl('/accueil'));
});
