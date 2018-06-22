<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MigrationsModel extends Model {
    public    $timestamps   = false;

    protected $table        = 'migrations';
    protected $fillable     = [];
    protected $guarded      = [];

    protected $primaryKey   = '';
    public    $incrementing = false;
}