<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table="bills";
    protected function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }
    protected function customer(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
