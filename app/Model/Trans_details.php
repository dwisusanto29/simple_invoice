<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trans_details extends Model
{
    protected $table = 't_transaction_details';

    protected $guarded = ['id'];

    public function trans(){
    	return $this->belongsTo('App\Model\Transaction', 'trans_id');
    }

    punlic function service() {
    	return $this->belongsTo('App\Model\Service', 'service_id');
    }
}
