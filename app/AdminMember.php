<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMember extends Model
{
    //
    protected $table = 'take_users';
    protected $primaryKey = 'uid';
    public $guarded = array('');
    public $timestamps = false;
}
