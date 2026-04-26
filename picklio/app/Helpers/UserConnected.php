<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserConnected
{
    public static function getUser()
    {
        return Auth::user();
    }
}
