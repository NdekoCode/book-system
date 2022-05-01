<?php
if (!function_exists('page_title')) {
    function page_title(?string $title): string
    {
        return !empty($title) ? $title . ' | ' . config('app.name') : config('app.name');
    }
}
