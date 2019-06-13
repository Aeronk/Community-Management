<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenditureType extends Model
{
//    protected $table = 'expenditure_types';
    protected $guarded = ['id','created_at','updated_at'];
}
