<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hod extends Model
{
    public function denomination()
    {
    	return $this->belongsTo(Denomination::class);
    } 

    public function parachurch()
    {
    	return $this->belongsTo(ParaChurch::class);
    }
}
