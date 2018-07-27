<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParaChurch extends Model
{
   public function hod()
    {
    	return $this->hasOne(Hod::class);
    }

    public function commissions()
    {
        $commission = $this->commission;

        $data = [
            'gender_dev' => [],
            'research_and_dev' => [],
            'humanitarian' => [],
            'peace_justice' => [],
            'comm_for_min' => []
        ];

        if(is_null($commission)) {
            return (object)$data;
        }

        $temp = explode(',', $commission->gender_dev);
        foreach ($temp as $item) {
            if(!is_null($item) && !empty($item)) {
                $data['gender_dev'][] = $item;
            }
        }

        $temp = explode(',', $commission->research_and_dev);
        foreach ($temp as $item) {
            if(!is_null($item) && !empty($item)) {
                $data['research_and_dev'][] = $item;
            }
        }

        $temp = explode(',', $commission->humanitarian);
        foreach ($temp as $item) {
            if(!is_null($item) && !empty($item)) {
                $data['humanitarian'][] = $item;
            }
        }

        $temp = explode(',', $commission->peace_justice);
        foreach ($temp as $item) {
            if(!is_null($item) && !empty($item)) {
                $data['peace_justice'][] = $item;
            }
        }

        $temp = explode(',', $commission->comm_for_min);
        foreach ($temp as $item) {
            if(!is_null($item) && !empty($item)) {
                $data['comm_for_min'][] = $item;
            }
        }

        return (object)$data;
    }

    public function contact()
    {
    	return $this->hasOne(Contact::class);
    }

    public function commission()
    {
        return $this->hasOne(Commission::class);
    }
    public function category()
        {
        	return $this->hasOne(Category::class,'name','category');
        }

    public function programs()
    {
        return $this->hasMany(Program::class);
    } 

    public function ministers()
    {
        return $this->hasMany(Minister::class);
    }

    public function individualcontributions()
    {
        return $this->hasMany(IndvidualContribution::class);
    }

}
