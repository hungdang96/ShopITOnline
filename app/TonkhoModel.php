<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TonkhoModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'tonkho';
    protected $fillable     = [
        'MSSP',
        'MaMac',
        'TenSP',
        'MSNCC',
        'MoTa',
        'DVT',
        'PathHinhAnh',
        'SoLo',
        'TriGiaTonKho',
        'TongNhap',
        'ThanhTienTongNhap',
        'TongXuat',
        'ThanhTienTongXuat',
        'TonCuoi',
        'ThanhTienTonCuoi',
        'MSDanhMuc',
        'NuocSanXuat',
        'ThangKT',
        'NamKT',
        'MSCN',
        'TenCN',
        'LastModify'
    ];
//    protected $guarded = ['MSSP','MaMac'];

    protected $primaryKey   = 'MSSP';
    public    $incrementing = false;
}