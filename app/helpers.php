<?php

if (!function_exists('base_url')) {
    function base_url(string $path = ''): string
    {
        $prefix = config('app.url', '');
        if ($path === '') return $prefix;
        return rtrim($prefix, '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('e')) {
    function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

