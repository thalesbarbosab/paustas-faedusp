<?php

namespace App\Helpers;

class Sanitize
{
    public static function onlyNumbers(?string $data) : ?string
    {
        if(!empty($data)){
            return preg_replace('/[^0-9]/', '', $data);
        }
        return null;
    }
}
