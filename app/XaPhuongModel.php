<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XaPhuongModel extends Model
{
    public $timestamps = false;

    protected $table = 'xaphuong';
    protected $fillable = [
        'xaid',
        'name',
        'maqh'
    ];

    public $primaryKey = 'xaid';
    public $incrementing = false;
}
