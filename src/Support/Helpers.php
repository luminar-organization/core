<?php

namespace Luminar\Core\Support;

use Random\RandomException;

class Helpers
{
    /**
     * @param  string $email
     * @return bool
     */
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @param  int $length
     * @return string
     * @throws RandomException
     */
    public static function randomString(int $length = 10): string
    {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * @param  string $string
     * @return string
     */
    public static function humanize(string $string): string
    {
        return ucwords(str_replace('_', ' ', $string));
    }
}
