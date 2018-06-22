<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonhangChitietModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'donhangchitiet';
    protected $fillable     = [
        'SoHD',
        'NgayBC',
        'NgayHD',
        'MSSP',
        'TenSP',
        'MoTa',
        'DVT',
        'SoLuong',
        'SoLo',
        'GiaXuatKhoCoThue',
        'GiaBanChuaThueChuaGiam',
        'GiaBanChueThueDaGiam',
        'GiamGia',
        'GiamCK',
        'TienGiamCK',
        'GiaBanCoThue',
        'ThueSuat',
        'TienThue',
        'ThanhTienChuaThue',
        'TrongLuong',
        'ThanhTienCoThue',
        'MSKH',
        'MSNCC',
        'MSNVBH',
        'LoaiHD',
        'ThangKT',
        'NamKT',
        'LastModify'
    ];
    protected $guarded      = ['Id','SoCT'];

    protected $primaryKey   = 'Id';
//    public    $incrementing = false;
}