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
        if($statuses->count() == 0){
            $statuses = [0, 0, 0];
        }
        $colors = [];
        foreach ($statuses as $status) {
            $label_demande[] = $status;
            if($status == 'pending'){
               $colors [] = '#f5a623';
            }
            if($status == 'accept'){
                $colors [] = 'rgba(8, 160, 48, 0.969)';
            }
            if($status == 'decline'){
                $colors [] = 'rgba(177, 13, 13, 0.969)';
            }
        }
        $statusCounts = DB::table('applications')
        ->selectRaw('status, count(*) as count')
        ->groupBy('status')
        ->get();
        foreach ($statusCounts as $statuscount) {
            $numbers[] = $statuscount->count;
        }
        if($statusCounts->count() == 0){
            $numbers = [0, 0, 0];
        }
        // dd($numbers);
        $chartjs2 = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels($label_demande)
        ->datasets([
            [
                'backgroundColor' => $colors,
                'hoverBackgroundColor' => $colors,
                'data' => $numbers
            ]
        ])
        ->options([]);

        return view('layouts.dashboard.panel-dash',compact('roles','users','demandess','chartjs2'));
    }
}
