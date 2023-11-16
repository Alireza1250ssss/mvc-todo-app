<?php

namespace App;

class Session
{
    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }
}