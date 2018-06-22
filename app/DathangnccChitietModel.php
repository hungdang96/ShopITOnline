<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DathangnccChitietModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'dathangnccchitiet';
    protected $fillable     = [
        'SoHD',
        'NgayBC',
        'NgayHD',
        'MSSP',
        'TenSP',
        'TonCuoi',
        'DatHangGoiY',
        'GhiChu',
        'MSNCC',
        'MSNCC',
        'LastModify',
        'MSCN',
        'TenCN'
    ];
    protected $guarded      = ['Id','SoCT'];

    protected $primaryKey   = 'Id';
//    public    $incrementing = false;
}