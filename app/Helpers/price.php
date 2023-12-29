<?php

if (!function_exists('create_price')) {
    /**
     * Generates a price based on the given number and power.
     *
     * Example: it will return a price of 2000 if the number is 2 and the power is 3.
     *          and it will return a price of 30000 if the number is 3 and the power is 4.
     *
     * @param float $number The number used to calculate the price.
     * @param int $power The power to raise the number to. Defaults to 3.
     * @return float The calculated price.
     */
    function create_price(float $number, int $power = 3)
    {
        // we don't want the power to be less than 1
        return $number * (10 ** max($power, 1));
    }
}

if (!function_exists('currency_format')) {
    /**
     * Formats a number as a currency. The default format is rupiah
     *
     * @param float $number The number to format.
     * @return string The formatted number.
     */
    function currency_format(float $number, $currency = 'Rp. ', $decimal = 0, $decimalSeparator = ',', $thousandSeparator = '.')
    {
        return $currency . number_format($number, $decimal, $decimalSeparator, $thousandSeparator);
    }
}
