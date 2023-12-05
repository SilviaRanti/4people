<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'admins';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'username',
        'password',
        'role'
    ];
}
