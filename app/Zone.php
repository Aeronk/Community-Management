<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function province(){
        return $this->belongsTo(Province::class);
    }
}
