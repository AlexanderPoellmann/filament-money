<?php

namespace AlexanderPoellmann\FilamentMoney\Forms\Components;

use Money\Money;
use Pelmered\LaraPara\MoneyFormatter\MoneyFormatter;

class MoneyInput extends \Pelmered\FilamentMoneyField\Forms\Components\MoneyInput
{
    protected ?bool $currencySwitcher = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrateStateUsing(function (self $component, null|int|string $state): ?string {
            if (! $state) {
                return null;
            }

            $currency = $component->getCurrency();
            $amount = MoneyFormatter::parseDecimal((string) $state, $currency, $component->getLocale(), $this->getDecimals());

            $amount = new Money((int) $amount, $currency->toMoneyCurrency());

            return $amount->getAmount();
        });
    }

    public function getDecimals(): int
    {
        if (! is_null($this->decimals)) {
            return $this->decimals;
        }

        return (int) config('filament-money-field.decimal_digits', 2);
    }
}
