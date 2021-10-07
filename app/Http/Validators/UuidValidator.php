<?php

namespace App\Http\Validators;

class UuidValidator
{
    public const UUID_REGEX = '/^[a-f0-9]{8}-?[a-f0-9]{4}-?4[a-f0-9]{3}-?[89ab][a-f0-9]{3}-?[a-f0-9]{12}\Z/';

    /**
     * @param  string  $string
     *
     * @return false|int
     */
    public static function isUuidString(string $string)
    {
        return preg_match(self::UUID_REGEX, $string);
    }
}
