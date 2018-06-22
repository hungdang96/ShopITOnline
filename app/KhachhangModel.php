<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachhangModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'khachhang';
    protected $fillable     = [
        'TenKH',
        'UserID',
        'CMND',
        'SDT',
        'GioiTinh',
        'NgaySinh',
        'SoNha',
        'DiaChiGiaoHang',
        'MaTinh',
        'MaHuyen',
        'MaPhuong',
        'MaVung',
        'GhiChu',
        'DiemTichLuy'
    ];
    protected $guarded      = ['MSKH'];

    protected $primaryKey   = 'MSKH';
    public    $incrementing = false;
}