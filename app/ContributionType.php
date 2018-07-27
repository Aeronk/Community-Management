<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributionType extends Model
{
     public function individualcontribution()
    {
    	return $this->belongsTo(IndividualContribution::class,'type','id');
    }
}
