<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('setActive')) {
    /**
     * Returns a CSS-class if route is active
     *
     * @param string|array $routes  route name or array of names
     * @param string $activeClass      CSS-class
     * @return string
     */
    function setActive(string|array $routes, string $activeClass = 'active'): string
    {
        foreach ((array) $routes as $route) {
            if (Request::routeIs($route)) {
                return $activeClass;
            }
        }
        return '';
    }
}
