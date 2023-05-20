<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conjoint;
use App\Models\Current;
use App\Models\File;
use App\Models\Personelinfo;
use App\Models\Previous;
use App\Models\Paiment;
use Dompdf\Dompdf;

class applicationController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
    public function index()
    {
        $userPersonelinfos = Personelinfo::all(); 
        $files = File::all(); 
        $conjoints = Conjoint::all(); 
        $previouss = Previous::all(); 
        $paiments = Paiment::paginate(5); 


        return view('layouts.dashboard.demand-dash',compact('files','userPersonelinfos','conjoints','paiments'));
    }
    public function showFiles($id)
    {
        $file = File::select('decisionnomination_path','decisionaffectation_path','certificatpriseservice_path','Bulletinsoldeavant_path','Bulletinsoldeapres_path','certifcatnomhebergement_path','attestationhonneurlegalise_path','certificatresidence_path','pieceidentite_path','actemariage_path')->find($id); 
        return response()->json([
            'file' => $file
        ]);

    }
}
