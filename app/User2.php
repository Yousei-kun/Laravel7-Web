<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User2 extends Model
{
    protected $table = 'user2s';

    protected $fillable = [
        'username', 'password',
    ];
}
