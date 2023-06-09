<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Fx3costa\LaravelChartJs\ChartJsBuilder;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles    = Role::all();
        $users    = User::all();
        $demandess = Application::all();
        $statuses = DB::table('applications')->distinct()->pluck('status');
        // dd($demandes);
        foreach ($statuses as $status) {
            $label_demande[] = $status;
        }
        $statusCounts = DB::table('applications')
        ->selectRaw('status, count(*) as count')
        ->groupBy('status')
        ->get();
        foreach ($statusCounts as $statuscount) {
            $numbers[] = $statuscount->count;
        }
        $colors = ['rgba(38, 185, 153, 0.969)','rgb(220, 213, 3)','rgba(117, 0, 117, 0.969)'];
        $chartjs2 = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels($label_demande)
        ->datasets([
            [
                'backgroundColor' => $colors,
                'hoverBackgroundColor' => $colors,
                'data' => 'ok'
            ]
        ])
        ->options([]);

        return view('layouts.dashboard.panel-dash',compact('roles','users','demandess','chartjs2'));
    }
}
