<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhmucModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'danhmuc';
    protected $fillable     = ['TenDanhMuc','MoTa','DanhMucCha','TrangThai'];
//    protected $guarded      = [];

    protected $primaryKey   = 'MSDanhMuc';
    public    $incrementing = false;
}