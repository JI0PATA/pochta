<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function index()
    {
        $queues = Queue::all();

        return view('terminal.index', [
            'queues' => $queues,
        ]);
    }

    public function hash()
    {
        $queues = Queue::all();

        return md5($queues);
    }

    public function check(Request $request)
    {
        $queues = Queue::all();

        $queuesList = Queue::find(collect(json_decode($request->post('list'))));

        return response(
            json_encode([
                'list' => $queues->diff($queuesList),
                'hash' => md5($queues)
            ])
        );
    }

    public function checkActive($id)
    {
        $queues = Queue::find($id);

        if(!isset($queues)) return 0;
        else return 1;
    }
}
