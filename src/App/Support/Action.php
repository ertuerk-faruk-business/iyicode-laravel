<?php

namespace IyiCode\App\Support;

use IyiCode\App\Support\Action\Response;

abstract class Action
{
    public abstract function handle(array $context): Response;

    public static function run(mixed $class, array $context = []): Response
    {
        $action = eval("return new {$class};");

        return $action->handle($context);
    }
}
