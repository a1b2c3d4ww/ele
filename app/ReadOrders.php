<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadOrders extends Model
{
    //
    protected $table = 'take_details';
    protected $primaryKey = 'did';
    public $guarded = array('');
    public $timestamps = false;

   

}
