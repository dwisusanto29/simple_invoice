<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 't_transactions';

    protected $guarded = ['id'];

    public function customer(){
    	return $this->belongsTo('App\Model\Customer', 'customer_id');
    }

    public function details(){
    	return $this->hasMany('App\Model\Trans_details');
    }
}

