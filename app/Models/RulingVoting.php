<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RulingVoting extends Model
{
    protected $fillable = ['ruling_id','cpf','name','email','city','state','cnpj','company_name','role'];
}
