<?php

namespace MediumInWp\App\Helpers\Globals;

class Strings
{
    public static function fromSnakeToCamel($string = null)
    {
        if (! $string){
            return false;
        }

        return ucfirst(str_replace('-', '', lcfirst(ucwords($string, '-'))));
    }
}