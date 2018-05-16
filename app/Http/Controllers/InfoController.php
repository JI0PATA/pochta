<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function index()
    {
        return view('info.index');
    }

    public function getApplicationsIdOnInfo()
    {
        $applicationsIdGroup = DB::table('applications')
            ->select('*')
            ->whereIn('updated_at',
                DB::table('applications')
                    ->selectRaw('MAX(updated_at)')
                    ->where('window_id', '<>', null)
                    ->groupBy('window_id')
            )
            ->get();

        $applicationsId = $applicationsIdGroup->map(function ($item) {
            return $item->id;
        });

        return $applicationsId;
    }

    public function hash()
    {
        $applicationsId = $this->getApplicationsIdOnInfo();

        $applications = Application::with(['window', 'queue'])->find($applicationsId->all());

        return md5($applications);
    }

    public function check(Request $request)
    {
        $applicationsId = $this->getApplicationsIdOnInfo();

        $applications = Application::with(['window', 'queue'])->find($applicationsId->all());

        $applicationsList = Application::with(['window', 'queue'])->find(collect($request->post('list')));

        return response(
            json_encode([
                'list' => $applications->diff($applicationsList),
                'hash' => md5($applications)
            ])
        );
    }

    public function checkActive($id)
    {
        $applicationsId = $this->getApplicationsIdOnInfo();

        if ($applicationsId->contains($id)) return 1;
        else return 0;
    }
}
