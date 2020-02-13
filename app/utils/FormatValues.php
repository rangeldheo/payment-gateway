<?php

namespace Utils;

use Interfaces\IMoneyFormat;

final class FormatValues
{
    public static function money(float $value, IMoneyFormat $moneyFormat = null): string
    {
        if (!$moneyFormat) {  
            $moneyFormat = new RealBRL();
        }
        return $moneyFormat::format($value);
    }
}
