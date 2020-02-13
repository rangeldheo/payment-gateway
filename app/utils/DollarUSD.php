<?php

namespace Utils;

use Interfaces\IMoneyFormat;

class DollarUSD implements IMoneyFormat
{
    public static function format(float $value): string
    {
        return 'U$' . (number_format($value, 2, '.', ','));
    }
}
