<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminReviews extends Model
{
    //
    protected $table = 'take_reviews';
    protected $primaryKey = 'rid';
    public $guarded = array('');
    public $timestamps = false;
}
