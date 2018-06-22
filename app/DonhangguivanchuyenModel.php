<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonhangguivanchuyenModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'donhangguivanchuyen';
    protected $fillable     = [
        'SoCT',
        'SoHD',
        'NgayDoiSoat',
        'NgayBC',
        'TienHD',
        'TienShip',
        'TienCOD',
        'TongCong',
        'TongTienBDThuHo',
        'TienCuocBDThuHo',
        'TienCuocBDChuyenPhat',
        'TongCongTraBD',
        'SoTienChenhLech',
        'MSKH',
        'TenKD',
        'TenNguoiNhan',
        'DiaChiKH',
        'GhiChu',
        'MaTinh',
        'MaHuyen',
        'MaPhuong',
        'TenSP',
        'ThangKT',
        'NamKT',
        'TrangThai',
        'DaThu',
        'UserID',
        'TrongLuong',
        'TrongLuongThucTe',
        'TienShipThucTe',
        'Loai',
        'LoaiCP',
        'MSDVVC',
        'TenDVVC',
        'Buoi',
        'BuuCucVanChuyen',
        'KeyAPI',
        'MaTTVanChuyen',
        'TenTTVanChuyen',
        'DaLayHang',
        'LastModify'
    ];
    protected $guarded      = ['MaVanDon'];

    protected $primaryKey   = 'MaVanDon';
    public    $incrementing = false;
}