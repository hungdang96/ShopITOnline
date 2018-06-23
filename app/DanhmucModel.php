<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhmucModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'danhmuc';
    protected $fillable     = [
        'MSDanhMuc',
        'TenDanhMuc',
        'MoTa',
        'DanhMucCha',
        'TrangThai',
        'created_at',
        'LastModify'
    ];
    protected $guarded      = ['MSDanhMuc'];

    protected $primaryKey   = 'MSDanhMuc';
    public    $incrementing = false;
}