<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuchiModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'thuchi';
    protected $fillable     = [
        'NgayBC',
        'NgayHD',
        'MSNguoiNop',
        'TenNguoiNop',
        'LoaiThue',
        'ThueSuat',
        'SoTienTruocThue',
        'TienThue',
        'SoTienSauThue',
        'NoiDung',
        'MSNV',
        'TenNV',
        'LoaiThuChi',
        'LoaiChungTu',
        'NganQuy',
        'MaKhoanMuc',
        'LoaiPhi',
        'LastModify'
    ];
    protected $guarded      = ['SoCT','SoHD'];

    protected $primaryKey   = 'SoCT';
    public    $incrementing = false;
}