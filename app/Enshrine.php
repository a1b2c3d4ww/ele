<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enshrine extends Model
{
    protected $table = 'take_enshrine';
    protected $primaryKey = 'eid';
    public $guarded = array('');
    public $timestamps = false;
}
