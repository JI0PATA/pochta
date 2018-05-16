<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'name',
        'prefix'
    ];

    public $timestamps = false;
}
