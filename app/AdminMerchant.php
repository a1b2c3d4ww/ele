<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMerchant extends Model
{
    protected $table = 'take_merchants';
   	protected $primaryKey  = 'mid';
   	public $timestamps= false;
   	protected $guarded = array('');

}
