<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create($queue_id)
    {
        $application = Application::create([
            'queue_id' => $queue_id,
            'created_at' => now()
        ]);

        return $application;
    }

    public function index()
    {
        return view('modules.applications.index');
    }

    public function join(Request $request)
    {
        $window_id = $request->get('window_id');
        $application_id = $request->get('application_id');

        $application = Application::find($application_id);
        $application->window_id = $window_id;
        $application->update();

        return $this->checkHash();
    }

    public function checkHash()
    {
        $applications = Application::with(['queue' ,'allowWindows'])->where('window_id', null)->get();
        return md5($applications);
    }

    public function check(Request $request)
    {
        $applications = Application::with(['queue' ,'allowWindows'])->where('window_id', null)->get();

        $applicationsList = Application::find(collect(json_decode($request->post('list'))));

        return response(
            json_encode([
                'list' => $applications->diff($applicationsList),
                'hash' => md5($applications)
            ])
        );

    }

    public function checkActive($id)
    {
        $application = Application::find($id);

        if (!isset($application)) return 0;
        elseif ($application->window_id !== null) return 0;
        else return 1;
    }
}
