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

    public static function correctCpf(string $cpf): ?string
    {
        $cpf = self::onlyNumbers($cpf);
        if (is_numeric($cpf)) {
            $clear_cpf = substr(str_repeat('0', 11).$cpf, -11);

            return $clear_cpf;
        }

        return null;
    }

    public static function correctCnpj(string $cnpj): ?string
    {
        $cnpj = self::onlyNumbers($cnpj);
        if (is_numeric($cnpj)) {
            $clear_cnpj = substr(str_repeat('0', 14).$cnpj, -14);

            return $clear_cnpj;
        }

        return null;
    }

    public static function setUppercaseString(?string $string): ?string
    {
        if (! empty($string)) {
            return mb_strtoupper($string);
        }

        return null;
    }
}
