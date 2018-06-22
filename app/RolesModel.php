<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'roles';
    protected $fillable     = [
        'TenRole',
        'TrangThai',
        'LastModify'
    ];
    protected $guarded      = ['Roleid'];

    protected $primaryKey   = 'Roleid';
    public    $incrementing = false;
}