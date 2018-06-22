<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonhangModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'donhang';
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
        'TienCOD',
        'TongCongCoThue',
        'LoaiCP',
        'MSKH',
        'TenKH',
        'ThangKT',
        'NamKT',
        'TrangThaiThanhToan',
        'TrangThaiPhu',
        'MSNVBH',
        'UserID',
        'DaThanhToan',
        'SoPhieuThu',
        'NganQuy',
        'LoaiHD',
        'TrongLuongHD',
        'MaVanDon',
        'MSDVVC',
        'TenDVVC',
        'TrangThaiDH',
        'SoTienChoNo'
    ];
    protected $guarded      = ['SoCT'];

    protected $primaryKey   = 'SoCT';
    public    $incrementing = false;
}