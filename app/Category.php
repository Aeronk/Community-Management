<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function denomination()
    {
    	return $this->belongsTo(Denomination::class,'category','name');
    }
      public function parachurch()
    {
    	return $this->belongsTo(ParaChurch::class);
    }
}
