<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanphamModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'sanpham';
    protected $fillable     = [
        'MSSP',
        'MaMac',
        'TenSP',
        'SoLo',
        'MoTa',
        'PathHinhAnh',
        'DVT',
        'MSNCC',
        'MSDanhMuc',
        'GiaNhap',
        'GiaNhapVAT',
        'GiaBanLe',
        'GiaBanSi',
        'TrongLuong',
        'ThoiGianBaoHanh',
        'NuocSanXuat',
        'DiemTichLuy',
        'SoDiemDuocDoi',
        'PhanTramCK',
        'TrangThai',
        'MSCTKM',
        'created_at',
        'LastModify'
    ];
//    protected $guarded      = ['MaMac'];

    protected $primaryKey   = 'MSSP';
    public    $incrementing = false;
}