<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'date_birth', 'gender'];

    public function species()
    {
        return $this->belongsToOne('App\Species');
    }
}
