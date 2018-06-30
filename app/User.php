<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserID',
        'email',
        'password',
        'roleid',
        'token',
        'remember_token',
        'TrangThai',
        'LastModify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'token',
        'remember_token',
    ];

    protected $keyType = 'varchar';
    protected $primaryKey = 'UserID';
}
