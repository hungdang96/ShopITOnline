<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrinhdoModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'trinhdo';
    protected $fillable     = [
        'TenTrinhDo',
        'created_at',
        'LastModify'
    ];
    protected $guarded      = ['MSTrinhDo'];

    protected $primaryKey   = 'MSTrinhDo';
    public    $incrementing = false;
}