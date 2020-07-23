<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = ['id'];

    public function customer(){
    	return $this->belongsTo('App\Model\Customer', 'customer_id');
    }

    public function details(){
    	return $this->hasMany('App\Model\Trans_details', 'trans_id');
    }
}
