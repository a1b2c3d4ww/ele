<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminOrders extends Model
{
    //
    protected $table = 'take_orders';
    protected $primaryKey = 'oid';
    public $guarded = array('');
    public $timestamps = false;
}
