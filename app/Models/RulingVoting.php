<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class RulingVoting extends Model
{
    protected $fillable = ['ruling_id','cpf','name','email','city','state','cnpj','company_name','role'];

    public function createdAtFormated(): ?string
    {
        if(!$this->created_at){
            return null;
        }

        return $this->created_at->format('d/m/Y H:i:s');
    }
}
