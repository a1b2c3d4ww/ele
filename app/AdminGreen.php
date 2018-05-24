<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGreen extends Model
{
    protected $table = 'take_greens';
   	protected $primaryKey  = 'gid';
   	public $timestamps= false;
   	protected $guarded = array('');
}
