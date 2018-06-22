<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyenModel extends Model
{
    public $timestamps = false;

    protected $table = 'quanhuyen';
    protected $fillable = [
        'maqh',
        'name',
        'matp'
    ];

    public $primaryKey = 'maqh';
    public $incrementing = false;
}
