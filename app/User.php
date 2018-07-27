<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [

        'name', 'email', 'password','denomination_id','province_id','ministry_id', 'mobile','user_level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  public function userlevel()
    {
        return $this->hasOne(Userlevel::class, 'id', 'user_level');
    }

     public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    } 

     public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }


 public function denomination()
    {
        return $this->hasOne(Denomination::class, 'id','denomination_id');
    }


}
