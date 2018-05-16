<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Window extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'number'
    ];

    public function queues()
    {
        return $this->belongsToMany('App\Queue', 'queue_windows');
    }

}
