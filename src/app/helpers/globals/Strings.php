<?php

namespace MediumInWp\App\Helpers\Globals;

class Strings
{
    public static function fromSnakeToCamel($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }
}