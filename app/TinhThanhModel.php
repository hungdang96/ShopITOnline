<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhThanhModel extends Model
{
    protected $table = 'tinhthanh';
    protected $primaryKey = 'provinceid';
    protected $fillable = [
        'provinceid', 'name', 'type'
    ];
}
