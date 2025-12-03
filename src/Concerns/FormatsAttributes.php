<?php

namespace AlexanderPoellmann\FilamentMoney\Concerns;

use Illuminate\Support\Str;

trait FormatsAttributes
{
    public function formatAttribute(string $attribute): string
    {
        return Str::of($attribute)->afterLast('.')->snake(' ')->title();
    }
}
