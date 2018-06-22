<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhTPModel extends Model
{
    public $timestamps = false;

    protected $table = 'tinhthanhpho';
    protected $fillable = [
        'matp',
        'name'
    ];

    public $primaryKey = 'matp';
    public $incrementing = false;
}
