<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLinks extends Model
{
    //
    protected $table = 'take_links';
    protected $primaryKey = 'yid';
    public $guarded = array('');
    public $timestamps = false;
}
