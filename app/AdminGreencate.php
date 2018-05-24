<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGreencate extends Model
{
   	protected $table = 'take_greencates';
   	protected $primaryKey  = 'fid';
   	public $timestamps= false;
   	protected $guarded = array('');
}
