<?php

if (!function_exists('currentRouteActive')) {
    function currentRouteActive(...$routes)
    {
        foreach ($routes as $route){
            if (Route::currentRouteNamed($route)) return 'active';
        }
    }
}

if (!function_exists('currentChildActive')) {
    function currentChildActive($chidren)
    {
        foreach ($chidren as $child){
            if (Route::currentRouteNamed($child['route'])) return 'active';
        }
    }
}

if (!function_exists('menuOpen')) {
    function menuOpen($chidren)
    {
        foreach ($chidren as $child){
            if (Route::currentRouteNamed($child['route'])) return 'menu-open';
        }
    }
}

if (!function_exists('isRole')) {
    function isRole($role)
    {
        return auth()->user()->usertype === $role;
    }
}

if (!function_exists('priceFormat')) {
    #Franck CFA
    // /*
    function priceFormat($number)
    {
        $fmt = new NumberFormatter( 'fr_FR', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($number, "XAF");
    }
    // */

    # dollar americain
    /*
    function priceFormat($number)
    {
        $fmt = new NumberFormatter( 'en_US', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($number, "USD");
    }
    */

    # ero
    /*
    function priceFormat($number)
    {
        $fmt = new NumberFormatter( 'fr_FR', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($number, "EUR");
    }
    */
}
