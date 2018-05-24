<?php

namespace App\home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'take_users';

    protected $primaryKey = 'uid';
}
