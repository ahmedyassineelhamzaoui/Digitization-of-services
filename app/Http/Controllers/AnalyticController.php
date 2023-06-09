<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $demandes = Application::all();

        return view('layouts.dashboard.panel-dash',compact('roles','users','demandes'));
    }
}
