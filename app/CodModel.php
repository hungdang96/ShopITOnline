<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'cod';
    protected $fillable     = ['TongTien','TienCOD','MSDVVC','TenDVVC'];
    protected $guarded      = ['Id'];

    protected $primaryKey   = 'Id';
//    public    $incrementing = false;
}