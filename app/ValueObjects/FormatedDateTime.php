<?php

namespace App\ValueObjects;

use DateTime;

class FormatedDateTime
{
    public function __construct(protected ?DateTime $date_time){}

    public function __toString()
    {
        if(!isset($this->date_time)){
            return null;
        }
        return $this->date_time->format('d-m-Y H:i:s');
    }
}
