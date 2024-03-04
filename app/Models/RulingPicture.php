<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RulingPicture extends Model
{
    public $fillable = ['ruling_id','path','is_default'];

    public function news()
    {
        return $this->belongsTo(Ruling::class);
    }
}
