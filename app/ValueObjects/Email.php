<?php

namespace App\ValueObjects;

use Stringable;
use InvalidArgumentException;

class Email implements Stringable
{
    public function __construct(public string $email)
    {
        if(FALSE === filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new InvalidArgumentException("Email '$email' is invalid");
        }
    }

    public function __toString() :  string
    {
        return $this->email;
    }
}
