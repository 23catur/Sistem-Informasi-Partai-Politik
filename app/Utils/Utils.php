<?php

namespace App\Utils;

use Illuminate\Support\Facades\Route;

class Utils
{
    public static function menuActive($routeName = [])
    {
        return Route::is($routeName) ? 'active' : '';
    }
}
