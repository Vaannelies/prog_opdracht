<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'date_birth', 'gender', 'species_id', 'food'];

    public function species()
    {
        return $this->belongsTo('App\Species');
    }
}
