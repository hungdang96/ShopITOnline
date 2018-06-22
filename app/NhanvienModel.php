<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanvienModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'nhanvien';
    protected $fillable     = [
        'IDNV',
        'MaNV',
        'TenNV',
        'UserID',
        'GioiTinh',
        'DienThoai',
        'NgaySinh',
        'CMND',
        'HoKhau',
        'NoiOHienTai',
        'MaTinh',
        'MSChuyenNganh',
        'MSTrinhDo',
        'MSPhongBan',
        'MSCN',
        'LuongCB',
        'PhuCap',
        'NgayTuyenDung',
        'LastModify',
        'TrangThai'
    ];
    protected $guarded      = ['IDNV'];

    protected $primaryKey   = 'IDNV';
    public    $incrementing = false;
}