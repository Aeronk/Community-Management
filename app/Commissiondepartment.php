<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commissiondepartment extends Model
{
    public function commission()
    {
    	return $this->belongsTo(Commission::class);
    }
}
