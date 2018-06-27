<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhacungcapModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'nhacungcap';
    protected $fillable     = [
        'id',
        'MSNCC',
        'TenNCC',
        'DiaChi',
        'MaTinh',
        'MaHuyen',
        'MaPhuong',
        'NguoiDaiDien',
        'SDT',
        'FAX',
        'SoTKNganHang',
        'TenNganHang',
        'TrangThai',
        'LastModify'
    ];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
    public    $incrementing = false;
}