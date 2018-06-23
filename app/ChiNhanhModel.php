<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiNhanhModel extends Model
{
    public $timestamps = false;

    protected $table = 'chinhanh';
    protected $fillable = [
        'MSCN',
        'TenCN',
        'DiaChi',
        'SDT',
        'TruongCN',
        'MaTinh',
        'MaHuyen',
        'MaPhuong',
        'TrangThai',
        'created_at',
        'LastModify'
    ];
    protected $guarded = 'MSCN';

    public $primaryKey = 'MSCN';
    public $incrementing = false;
}
