<?php

use App\Livewire\admin\admin\Dashboard;
use App\Livewire\admin\admin\Merchant;
use App\Livewire\admin\admin\Merchants;
use App\Livewire\admin\admin\Message;
use App\Livewire\admin\admin\Messages;
use App\Livewire\admin\admin\NewMerchantMessage;
use App\Livewire\admin\admin\Order;
use App\Livewire\admin\admin\Orders;
use App\Livewire\admin\admin\Settings;
use App\Livewire\admin\admin\Statistics;
use App\Livewire\admin\admin\Stock;
use App\Livewire\admin\admin\Stocks;
use App\Livewire\admin\admin\SuggestMessage;
use App\Livewire\admin\client\ClientDashboard;
use App\Livewire\admin\client\ClientMessage;
use App\Livewire\admin\client\ClientMessages;
use App\Livewire\admin\client\ClientSettings;
use App\Livewire\admin\client\ClientStatistics;
use App\Livewire\admin\client\ClientStock;
use App\Livewire\admin\client\ClientStocks;
use App\Livewire\auth\Login;
use App\Livewire\auth\Logout;
use App\Livewire\auth\password\ForgetPassword;
use App\Livewire\auth\password\ResetPassword;
use App\Livewire\auth\Register;
use App\Livewire\front\Basket;
use App\Livewire\front\Catalogue;
use App\Livewire\front\Catalogues;
use App\Livewire\front\Contact;
use App\Livewire\front\FrontMerchant;
use App\Livewire\front\Home;
use App\Livewire\front\LegalNotice;
use App\Livewire\front\OrderConfirmation;
use App\Livewire\front\PrivacyPolicy;
use App\Livewire\front\Profil;
use App\Livewire\front\Slot;
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
                    Route::get(__('route.admin.admin.newMerchantMessage').'/{newMerchantMessage}', NewMerchantMessage::class)->name('admin.message.new-merchant.show');
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
        Route::get(__('route.front.slot'), Slot::class)->name('front.slot');
        Route::get(__('route.front.order-confirmation'), OrderConfirmation::class)->name('front.order-confirmation');
        Route::get(__('route.front.profil'), Profil::class)->name('front.profil');
        Route::get(__('route.front.legal-notice'), LegalNotice::class)->name('front.legal-notice');
        Route::get(__('route.front.privacy-policy'), PrivacyPolicy::class)->name('front.privacy-policy');
        Route::get(__('route.front.contact'), Contact::class)->name('front.contact');

    });
