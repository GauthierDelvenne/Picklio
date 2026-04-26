<?php

namespace App\Traits;

use App\Helpers\UserConnected;
//use App\Models\Lang;
use ReflectionClass;

trait PicklioTrait
{
    public $userConnected;

    public $activeLang;

    public $translatedLang;

    public $langs;


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
}
