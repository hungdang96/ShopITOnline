<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyennganhModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'chuyennganh';
    protected $fillable     = [
        'MSChuyenNganh',
        'TenChuyenNganh',
        'TrangThai',
        'created_at',
        'LastModify'
    ];
//    protected $guarded      = ['MSChuyenNganh'];

    protected $primaryKey   = 'MSChuyenNganh';
    public    $incrementing = false;
}