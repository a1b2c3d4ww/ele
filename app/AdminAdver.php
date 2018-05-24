<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminAdver extends Model
{
    //
    protected $table = 'take_advertis';
    protected $primaryKey = 'lid';
    public $guarded = array('');
    public $timestamps = false;
}
