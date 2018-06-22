<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVuModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'chucvu';
    protected $fillable     = [
        'MSChucVu',
        'TenChucVu',
        'TrangThai',
        'LastModify'
    ];
    protected $guarded      = ['MSChucVu'];

    protected $primaryKey   = 'MSChucVu';
    public    $incrementing = false;
}