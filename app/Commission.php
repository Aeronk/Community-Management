<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    public function denomination()
    {
    	return $this->belongsTo(Denomination::class, 'denomination_id');
    }
    public function programs()
    {
		return $this->hasMany(Commissiondepartment::class);
    }

      public function parachurch()
    {
    	return $this->belongsTo(ParaChurch::class);
    }
}
