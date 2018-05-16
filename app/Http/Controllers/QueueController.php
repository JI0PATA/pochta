<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queues = Queue::all();

        return view('modules.queues.index', [
            'queues' => $queues
        ]);
    }

    public function add()
    {
        return view('modules.queues.add');
    }

    public function create(Request $request)
    {
        try {
            Queue::create([
                'name' => $request->name,
                'prefix' => $request->prefix
            ]);
        } catch (\Exception $e) {
            createMsg(0, 'Дублирование префикса');
            return back();
        }

        return redirect()->route('user.queues.index');
    }

    public function edit($id)
    {
        $queue = Queue::find($id);

        return view('modules.queues.edit', [
            'queue' => $queue
        ]);
    }

    public function update(Request $request, $id) {
        $queue = Queue::find($id);

        $queue->name = $request->name;
        $queue->prefix = $request->prefix;

        try {
            $queue->update();
        } catch (\Exception $e) {
            createMsg(0, 'Дублирование префикса');
            return back();
        }

        return back();
    }

    public function delete($id)
    {
        $queue = Queue::find($id);
        $queue->delete();
        return back();
    }
}
