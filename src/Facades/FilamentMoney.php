<?php

namespace AlexanderPoellmann\FilamentMoney\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AlexanderPoellmann\FilamentMoney\FilamentMoney
 */
class FilamentMoney extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AlexanderPoellmann\FilamentMoney\FilamentMoney::class;
    }
}
