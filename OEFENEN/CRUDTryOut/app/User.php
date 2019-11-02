<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'active', 'date_birth', 'employee_since', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name', $roles)->first())
        {
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }

        return false;
    }

    public function isOld($days)
    {
        $difference = "-" . $days . " days"; // turns days into a string with the right structure
        $max_date = date('Y-m-d', strtotime($difference));
        $employee_since = $this->employee_since;
        if($employee_since <= $max_date)
        {
            return true;
        }

        return false;
    }
  
    public function species()
    {
        return $this->belongsToMany('App\Species');
    }
    

    // public function noNoob($employee_since)
    // {   
    //     if($this->{

    //     }
    // }
}
