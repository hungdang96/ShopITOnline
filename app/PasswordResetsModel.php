<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordResetsModel extends Model {
//    public    $timestamps   = false;

    protected $table        = 'passwordresets';
    protected $fillable     = [
        'email',
        'token',
        'created_at'
    ];
//    protected $guarded      = [];

    protected $primaryKey   = '';
    public    $incrementing = false;
}