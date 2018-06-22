<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhishipModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'phiship';
    protected $fillable     = [
        'TrongLuongTu',
        'TrongLuongDen',
        'SoTienNoiThanh',
        'SoTienNgoaiThanh',
        'MaVung',
        'LastModify'
    ];
    protected $guarded      = ['Id'];

    protected $primaryKey   = 'Id';
//    public    $incrementing = false;
}