<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HosovandonModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'hosovandon';
    protected $fillable     = [
        'TenVanDon',
        'PhanLoai',
        'DaDung',
        'KeyAPI'
    ];
    protected $guarded      = ['MaVanDon'];

    protected $primaryKey   = 'MaVanDon';
    public    $incrementing = false;
}