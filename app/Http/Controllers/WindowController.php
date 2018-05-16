<?php

namespace App\Http\Controllers;

use App\Queue;
use App\QueueWindow;
use App\Window;
use Illuminate\Http\Request;

class WindowController extends Controller
{
    public function index()
    {
        $windows = Window::all();

        return view('modules.windows.index', [
            'windows' => $windows,
        ]);
    }

    public function add()
    {
        $queues = Queue::all();

        return view('modules.windows.add', [
            'queues' => $queues
        ]);
    }

    public function create(Request $request)
    {
        try {
            $window = Window::create([
                'number' => $request->number,
            ]);
        } catch (\Exception $e) {
            createMsg(0, 'Дублирование номеров окон');
            return back();
        }

        $window->queues()->attach($request->queues);

        return redirect()->route('user.windows.index');
    }

    public function edit($id)
    {
        $window = Window::find($id);
        $queues = Queue::all();

        return view('modules.windows.edit', [
            'window' => $window,
            'queues' => $queues
        ]);
    }

    public function update(Request $request, $id)
    {
        $window = Window::find($id);

        $window->number = $request->number;
        try {
            $window->update();
        } catch (\Exception $e) {
            createMsg(0, 'Дублирование номеров окон');
            return back();
        }

        $window->queues()->sync($request->queues);

        return back();
    }

    public function delete($id)
    {
        $window = Window::find($id);

        $window->delete();

        return back();
    }
}
