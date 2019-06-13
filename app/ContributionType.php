<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributionType extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

     public function individualcontribution()
    {
    	return $this->belongsTo(IndividualContribution::class,'type','id');
    }
}
