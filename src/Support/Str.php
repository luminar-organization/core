<?php

namespace Luminar\Core\Support;

class Str
{
    /**
     * @param  string $string
     * @return string
     */
    public static function snakeCase(string $string): string
    {
        return strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($string)));
    }

    /**
     * @param  string $string
     * @return string
     */
    public static function camelCase(string $string): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
    }

    /**
     * @param  string $string
     * @return string
     */
    public static function titleCase(string $string): string
    {
        return ucwords($string);
    }
}
