<?php

namespace AlexanderPoellmann\FilamentMoney\Forms\Components;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Money\Money;
use Pelmered\LaraPara\Currencies\Currency;
use Pelmered\LaraPara\Currencies\CurrencyRepository;
use Pelmered\LaraPara\MoneyFormatter\MoneyFormatter;

class MoneyInput extends \Pelmered\FilamentMoneyField\Forms\Components\MoneyInput
{
    protected ?bool $currencySwitcher = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrateStateUsing(function (MoneyInput $component, null|int|string $state): ?string {
            if (! $state) {
                return null;
            }

            $currency = $component->getCurrency();
            $amount   = MoneyFormatter::parseDecimal((string) $state, $currency, $component->getLocale(), $this->getDecimals());

            $amount = new Money((int) $amount, $currency->toMoneyCurrency());

            return $amount->getAmount();
        });
    }
}
