<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhapkhoModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'nhapkho';
    protected $fillable     = [
        'SoHD',
        'NgayBC',
        'NgayHD',
        'GiamGia',
        'GiamCK',
        'TienGiamCK',
        'TongCongChuaThue',
        'ThueSuat',
        'TienThue',
        'TienShip',
        'TongCongCoThue',
        'LoaiXuat',
        'MSNCC',
        'ThangKT',
        'NamKT',
        'TrangThai',
        'MSCN',
        'TenCN',
        'UserID',
        'LoaiHD',
        'LastModify'
    ];
    protected $guarded      = ['SoCT'];

    protected $primaryKey   = 'SoCT';
    public    $incrementing = false;
}