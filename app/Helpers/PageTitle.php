<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageTitle {
    public static function getPageTitle() {
        $currentRoute = Route::currentRouteName();
        if ($currentRoute) {
            $explodeRoute = explode('.', $currentRoute);
            return $explodeRoute[0];
        }

        return 'default'; // Or return null / empty string based on your use case
    }
}
