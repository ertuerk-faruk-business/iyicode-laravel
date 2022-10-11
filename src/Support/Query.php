<?php

namespace IyiCode\Support;

use IyiCode\Livewire\View;

abstract class Query
{
    public abstract function handle(View $view, array $context);

    public static function get(View $view, mixed $class, array $context = [])
    {
        $query = eval("return new {$class};");

        return $query->handle($view, $context);
    }
}
