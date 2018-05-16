<?php

namespace App\Http\Controllers;

use App\QueueWindow;
use App\Window;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $queue_window = Window::with('queues')->find(1);

        return $queue_window;
    }
}
