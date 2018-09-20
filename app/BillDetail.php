<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table="bill_detail";
    protected function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }

    protected function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
