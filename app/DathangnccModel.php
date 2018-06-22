<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DathangnccModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'dathangnccchitiet';
    protected $fillable     = [
        'NgayBC',
        'MSNCC',
        'TenNCC',
        'TrangThai'
    ];
    protected $guarded      = ['SoCT'];

    protected $primaryKey   = 'SoCT';
    public    $incrementing = false;
}