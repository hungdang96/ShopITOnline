<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NganquyModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'nganquy';
    protected $fillable     = [
        'TenNganQuy',
        'SoTK',
        'TenTK',
        'TrangThai'
    ];
    protected $guarded      = ['MaNganQuy'];
    protected $primaryKey   = 'MaNganQuy';
    public    $incrementing = false;
}