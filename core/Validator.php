<?php

namespace core;
class Validator
{
    public static function string_check($value,$min=1,$max=INF)
    {
        $len= strlen(trim($value));
        return $len >= $min && $len <= $max;
    }

    public static function email($value){
        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }
}

?>