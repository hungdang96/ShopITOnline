<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhapkhoChitietModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'nhapkhochitiet';
    protected $fillable     = [
        'SoCT',
        'SoHD',
        'NgayBC',
        'NgayHD',
        'MSSP',
        'TenSP',
        'MoTa',
        'DVT',
        'MSDanhMuc',
        'NuocSanXuat',
        'SoLuong',
        'SoLo',
        'MSNCC',
        'LoaiHD',
        'ThangKT',
        'NamKT',
        'LastModify'
    ];
    protected $guarded      = ['Id','SoCT'];

    protected $primaryKey   = 'Id';
//    public    $incrementing = false;
}