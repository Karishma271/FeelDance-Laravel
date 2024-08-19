<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [
        'username', 'email', 'first_name', 'last_name', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
