<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapMaNhanVienModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'capmanhanvien';
    protected $fillable     = [
        'MaStaff',
        'LastModify'
    ];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
//    public    $incrementing = false;
}