<?php

class Helper
{
    /**
     * Verify if the given string is a JSON by checking Its first letter.
     *
     * @param String $string
     * @return Bool
     */
    public static function is_json($string)
    {
        $firstLetter = substr($string, 0, 1);

        return ($firstLetter == '{' || $firstLetter == '[') ? true : false;
    }

}