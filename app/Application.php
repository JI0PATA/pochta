<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'queue_id',
    ];

    public function window()
    {
        return $this->belongsTo('App\Window');
    }

    public function queue()
    {
        return $this->belongsTo('App\Queue');
    }

    public function allowWindows()
    {
        return $this->belongsToMany('App\Window', 'queue_windows', 'queue_id', 'window_id', 'queue_id')->orderBy('windows.number');
    }
}
