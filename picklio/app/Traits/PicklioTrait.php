<?php

namespace App\Traits;

use App\Helpers\UserConnected;
// use App\Models\Lang;
use App\Models\Order;
use ReflectionClass;

trait PicklioTrait
{
    public $userConnected;

    public $activeLang;

    public $translatedLang;

    public $langs;

    private static array $cartCache = [];

    public function __construct()
    {
        $this->userConnected = UserConnected::getUser();
        //        $this->activeLang = Lang::getDefaultLangId();
        //        $this->translatedLang = $this->activeLang;
        //        $this->langs = Lang::all();
    }

    public function getClassName(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }

    public function getCartByAccount(int $accountId): ?Order
    {
        if (! array_key_exists($accountId, self::$cartCache)) {
            self::$cartCache[$accountId] = Order::orderCart($accountId)->first();
        }

        return self::$cartCache[$accountId];
    }

    public function clearCartCache(int $accountId): void
    {
        unset(self::$cartCache[$accountId]);
    }
}
