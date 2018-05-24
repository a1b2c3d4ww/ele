<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //
   	protected $table = 'take_admins';
   	protected $primaryKey  = 'aid';

   	public $timestamps= false;
   	protected $guarded = array('');

}
