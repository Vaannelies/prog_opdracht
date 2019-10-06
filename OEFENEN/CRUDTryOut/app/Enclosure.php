<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    public function species(){
        return $this->belongsTo('App\Species');
    }
}
