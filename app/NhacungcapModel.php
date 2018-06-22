<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhacungcapModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'nhacungcap';
    protected $fillable     = [
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
        'TrangThai'
    ];
    protected $guarded      = ['MSNCC'];

    protected $primaryKey   = 'MSNCC';
    public    $incrementing = false;
}