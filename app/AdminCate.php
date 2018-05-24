<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminCate extends Model
{
    protected $table = 'take_cates';
   	protected $primaryKey  = 'cid';
   	public $timestamps= false;
   	protected $guarded = array('');
}
