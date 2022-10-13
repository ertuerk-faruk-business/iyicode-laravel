<?php

namespace IyiCode\App\Support\View;

class SideBar
{
    private static bool $isFixed = false;

    private static bool $isAlwaysVisible = false;

    private static bool $isDisabled = false;

    public static function fixed()
    {
        self::$isFixed = true;
    }

    public static function disable()
    {
        self::$isDisabled = true;
    }

    public static function alwaysVisible()
    {
        self::$isAlwaysVisible = true;
    }

    public static function isFixed(): bool
    {
        return self::$isFixed;
    }

    public static function isAlwaysVisible(): bool
    {
        return self::$isAlwaysVisible;
    }

    public static function isDisabled(): bool
    {
        return self::$isDisabled;
    }
}
