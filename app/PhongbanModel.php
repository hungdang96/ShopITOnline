<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongbanModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'phongban';
    protected $fillable     = [
        'MSPhongBan',
        'TenPhongBan',
        'TrangThai',
        'created_at',
        'LastModify'
    ];
//    protected $guarded      = ['MSPhongBan'];

    protected $primaryKey   = 'MSPhongBan';
    public    $incrementing = false;
}