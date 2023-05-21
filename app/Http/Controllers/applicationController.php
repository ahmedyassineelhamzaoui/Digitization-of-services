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
use App\Models\Application;
use Dompdf\Dompdf;


class applicationController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        if($user->hasPermissionTo('modifier-utilisateur')){
            $userPersonelinfos = Personelinfo::all(); 
            $files = File::all(); 
            $conjoints = Conjoint::all(); 
            $previouss = Previous::all(); 
            $applications = Application::paginate(5); 
    
            return view('layouts.dashboard.demand-dash',compact('files','userPersonelinfos','conjoints','applications'));    
        }else{
            $userPersonelinfos = Personelinfo::all(); 
            $files = File::all(); 
            $conjoints = Conjoint::all(); 
            $previouss = Previous::all(); 
            $applications = $user->applications()->paginate(5); 
        
            return view('layouts.dashboard.demand-dash', compact('files','userPersonelinfos','conjoints','applications')); 
        }
    }
    public function showFiles($id)
    {
        $file = File::select('decisionnomination_path','decisionaffectation_path','certificatpriseservice_path','Bulletinsoldeavant_path','Bulletinsoldeapres_path','certifcatnomhebergement_path','attestationhonneurlegalise_path','certificatresidence_path','pieceidentite_path','actemariage_path')->find($id); 
        return response()->json([
            'file' => $file
        ]);

    }
    public function showEditform($id)
    {
         $application = Application::find($id);
         if($application){
            return response()->json([
                'id' => $application->id
            ]);
         }
    }
    public function updateStatus(Request $request)
    {
      $application = Application::find($request->status_id);
      if($application){
        
        $application->status = $request->input('status_name');
        $application->message = $request->comment;
        $application->save();
        return response()->json([
            'message' => 'la demandes a été bien modifier'
          ]);
      }
      return response()->json([
          'error' => 'la demande n\'éxiste pas'
      ]);
      
    }
    public function deleteApplication(Request $request)
    {
        $application = Application::find($request->app_deletedId);
        if($application){
            $application->delete();
            return redirect()->back()->with('success','la demande a  été bien supprimer');
        }
        return redirect()->back()->with('error','la demande n\'éxiste pas');
    }
}
