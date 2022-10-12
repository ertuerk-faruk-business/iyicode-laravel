<?php

namespace IyiCode\App\Services;

class SideBar
{
    private static bool $alwaysVisible = false;

    private static bool $disabled = false;

    public static function disable()
    {
        self::$disabled = true;
    }

    public static function alwaysVisible(): void
    {
        self::$alwaysVisible = true;
    }

    public static function isDisabled(): bool
    {
        return self::$disabled;
    }

    public static function isAlwaysVisible(): bool
    {
        return self::$alwaysVisible;
    }
}
