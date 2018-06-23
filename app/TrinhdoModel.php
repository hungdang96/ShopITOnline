<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrinhdoModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'trinhdo';
    protected $fillable     = [
        'MSTrinhDo',
        'TenTrinhDo',
        'created_at',
        'LastModify',
        'TrangThai'
    ];
//    protected $guarded      = ['MSTrinhDo'];

    protected $primaryKey   = 'MSTrinhDo';
    public    $incrementing = false;
}