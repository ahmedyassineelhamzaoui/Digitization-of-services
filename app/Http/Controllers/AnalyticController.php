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
        $bottonName ='';
        $roles    = Role::all();
        $users    = User::all();
        $demandess = Application::all();
        $statuses = DB::table('applications')->distinct()->pluck('status');
        if($statuses->count() == 0){
            $statuses = [0,0,0];
        }
        $colors = [];
        foreach ($statuses as $status) {
            if($status == 'accepter'){
                $label_demande[] = 'accepté' ;
            }else if($status == 'refuser'){
                $label_demande[] = 'refusé';
            }else{
                $label_demande[] =  $status;
            }
            if($status == 'en attente'){
               $colors [] = '#7a6767';
            }
            if($status == 'accepter'){
                $colors [] = 'rgba(8, 160, 48, 0.969)';
            }
            if($status == 'refuser'){
                $colors [] = 'rgba(177, 13, 13, 0.969)';
            }if($status == 'en cours'){
                $colors [] = '#f5a623';
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
            $numbers[] = [0,0,0];
        }
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





        $currentWeek = date('W');
        $currentMonth = date('m');
        $currentYear = date('Y');

        $daysInWeek = 7;

        // Calculate the start and end dates of the current week
        $startDate = date('Y-m-d', strtotime('monday this week'));
        $endDate = date('Y-m-d', strtotime('sunday this week'));
        // Get the number of applications by day of the week for the current week
        $ordersByDayOfWeek = [0,0,0,0,0,0,0];
        
        $myapplications =  DB::table('applications')
        ->select(DB::raw('DATE(created_at) as day'), DB::raw('CAST(COUNT(*) AS UNSIGNED) as count'))
        ->whereBetween('created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59'])
        ->groupBy('day')
        ->get();
         $tab = 0;
        foreach ($myapplications as $myapplication) {
            $dayOfWeek = date('w', strtotime($myapplication->day));
            if($dayOfWeek == 0){
                $dayOfWeek = 7;
            }
            $ordersByDayOfWeek[$dayOfWeek -1] = intval($myapplication->count);
        }
        // Create the chart for the number of applications by day of the week
        $chartByDayOfWeek = app()->chartjs
            ->name('OrdersByDayOfWeek')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'])
            ->datasets([
                [
                    'label' => 'Nombre des demandes',
                    'backgroundColor' => 'rgb(3, 0, 151)',
                    'data' => $ordersByDayOfWeek,
                ],
            ])
            ->options([
            ]);

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
        $ordersByDayOfMonth = array_fill(1, $daysInMonth, 0);

        $myapplications = DB::table('applications')
            ->select(DB::raw('DAY(created_at) as day'), DB::raw('CAST(COUNT(*) AS UNSIGNED) as count'))
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->groupBy('day')
            ->get();

        foreach($myapplications as $myapplication) {
            $ordersByDayOfMonth[intval($myapplication->day)] = intval($myapplication->count);
        }
        // Create the chart for the number of applications by day of the month
        $chartByDayOfMonth = app()->chartjs
            ->name('OrdersByDayOfMonth')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(range(1, $daysInMonth))
            ->datasets([
                [
                    'label' => 'Nombre des demandes',
                    'backgroundColor' => 'rgb(3, 0, 151)',
                    'data' => array_values($ordersByDayOfMonth),
                ],
            ])
            ->options([]);

        // Get the number of applications by day of the year for the current year
        $daysInYear = 365 + intval(date('L'));
        $ordersByDayOfYear = array_fill(1, $daysInYear, 0);

        $myapplications = DB::table('applications')
            ->select(DB::raw('DAYOFYEAR(created_at) as day'), DB::raw('CAST(COUNT(*) AS UNSIGNED) as count'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('day')
            ->get();

        foreach($myapplications as $myapplication) {
            $ordersByDayOfYear[intval($myapplication->day)] = intval($myapplication->count);
        }

        // Create the chart for the number of applications by day of the year
        $chartByDayOfYear = app()->chartjs
            ->name('OrdersByDayOfYear')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(range(1, $daysInYear))
            ->datasets([
                [
                    'label' => 'Nombre des demandes',
                    'backgroundColor' => 'rgb(3, 0, 151)',
                    'data' => array_values($ordersByDayOfYear),
                ],
            ])
            ->options([ ]);



        return view('layouts.dashboard.panel-dash',compact('roles','users','demandess','chartjs2','chartByDayOfMonth','chartByDayOfYear','chartByDayOfWeek','bottonName'));
    }
}
