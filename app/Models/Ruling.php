<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTime;

class Ruling extends Model
{
    protected $fillable = ['slug','title','resume','description','publish_date','expiration_date','views','author'];

    protected $with = ['pictures'];

    protected $withCount = ['pictures','rulingVoting'];

    public function pictures()
    {
        return $this->hasMany(RulingPicture::class)->orderBy('is_default','desc');
    }

    public function rulingVoting()
    {
        return $this->hasMany(RulingVoting::class)->orderBy('created_at','desc');
    }

    public function publishDateFormated(): ?string
    {
        if(!$this->publish_date){
            return null;
        }
        $publish_date = new DateTime($this->publish_date);

        return $publish_date->format('d/m/Y');
    }

    public function expirationDateFormated(): ?string
    {
        if(!$this->expiration_date){
            return null;
        }
        $expiration_date = new DateTime($this->expiration_date);

        return $expiration_date->format('d/m/Y');
    }


}
