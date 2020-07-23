<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'm_services';

    protected $guarded = ['id'];

    public function type(){

		return $this->belongsTo('App\Model\Service_type', 'type_id');
    }
}
