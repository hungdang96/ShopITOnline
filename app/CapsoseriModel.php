<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapsoseriModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'capsoseri';
    protected $fillable     = [
        'SoSeri',
        'LoaiSeri',
        'GiaTri',
        'LastModify'
    ];
    protected $guarded      = ['MSSeri'];

    protected $primaryKey   = 'MSSeri';
//    public    $incrementing = false;
}