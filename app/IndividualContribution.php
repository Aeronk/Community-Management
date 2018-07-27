<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualContribution extends Model
{
     public function denomination()
    {
    	return $this->belongsTo(Denomination::class);
    }

    public  function contributiontype()
    {
    	return $this->hasOne(ContributionType::class, 'id','type');

    }
}
