<?php

namespace Utils;

use Interfaces\IMoneyFormat;

class RealBRL implements IMoneyFormat
{
    public static function format(float $value): string
    {
        return 'R$' . (number_format($value, 2, ',', '.'));
    }
}
