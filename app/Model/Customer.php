<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'm_customer';

    protected $guarded = ['id'];
}
