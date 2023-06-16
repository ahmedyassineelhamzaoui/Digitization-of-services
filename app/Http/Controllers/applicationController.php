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
use App\Notifications\documentAction;
use App\Notifications\documentResponse;
use Illuminate\Support\Facades\Notification;
use App\Mail\DocumentResponseMail;
use Illuminate\Support\Facades\Mail;


class applicationController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        
        if($user->hasPermissionTo('modifier-demandes')){
            $applicationNames  = Application::All();
            $names = [];
            foreach($applicationNames as $applicationName){
                $user = User::find($applicationName->user_id);
                $names[] = $user->full_name;
            }
            $userPersonelinfos = Personelinfo::all(); 
            $files             = File::all(); 
            $conjoints         = Conjoint::all(); 
            $previouss         = Previous::all(); 
            $applications      = Application::paginate(5); 
            return view('layouts.dashboard.demand-dash',compact('files','userPersonelinfos','conjoints','applications','names'));    
        }else{
            $applicationNames  =  $user->applications()->get();
            $names = [];
            foreach($applicationNames as $applicationName){
                $user = User::find($applicationName->user_id);
                $names[] = $user->full_name;
            }
            $userPersonelinfos = Personelinfo::all(); 
            $files             = File::all(); 
            $conjoints         = Conjoint::all(); 
            $previouss         = Previous::all(); 
            $applications      = $user->applications()->paginate(5);
            return view('layouts.dashboard.demand-dash', compact('files','userPersonelinfos','conjoints','applications','names')); 
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
      $authUser = auth()->user();
      $application = Application::find($request->status_id);
      if($application){
        $useraction  = User::find($application->user_id); 
        $controleur1 = User::role('controleur 1')->first();
        $controleur2 = User::role('controleur 2')->first();
        $controleur3 = User::role('controleur 3')->first();
        $admin       = User::role('Administrateur')->first();

        if($authUser->roles[0]->name == 'controleur 1'){
            if($request->input('status_name') == 'accept'){
                $application->status = 'in progress';
                $application->message = $request->comment;
                $application->editable2='yes';
                $application->editable1='no';
                $application->save();
                $controleur2->givePermissionTo([
                    'voir-demande-action'
                ]);
                $operation = $request->input('status_name');
                Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur2, new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur3, new documentAction($authUser->id,$operation,$useraction->full_name));
                return response()->json([
                    'message' => 'la demandes a été bien modifier'
                ]);
            }else{
                $application->status = $request->input('status_name');
                $application->message = $request->comment;
                $application->editable1='no';
                $application->editable2='no';
                $application->save();
                $operation = $request->input('status_name');
                Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur2, new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur3, new documentAction($authUser->id,$operation,$useraction->full_name));
                return response()->json([
                    'message' => 'la demandes a été bien modifier'
                ]);
            }
            
        }else
        if($authUser->roles[0]->name == 'controleur 2'){
            if($request->input('status_name') == 'accept'){
                $application->status = 'in progress';
                $application->message = $request->comment;
                $application->editable3='yes';
                $application->editable2='no';
                $application->save();
                $controleur3->givePermissionTo([
                    'voir-demande-action'
                ]);
                $operation = $request->input('status_name');
                Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur1, new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur3, new documentAction($authUser->id,$operation,$useraction->full_name));
                return response()->json([
                    'message' => 'la demandes a été bien modifier'
                ]);
            }else{
                $application->status = $request->input('status_name');
                $application->message = $request->comment;
                $application->editable2='no';
                $application->editable3='no';
                $application->save();
                $operation = $request->input('status_name');
                Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur1, new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur3, new documentAction($authUser->id,$operation,$useraction->full_name));
                return response()->json([
                    'message' => 'la demandes a été bien modifier'
                ]);
            }
        }else
        if($authUser->roles[0]->name == 'controleur 3'){
            $application->status = $request->input('status_name');
            $application->message = $request->comment;
            $application->save();
            $operation = $request->input('status_name');
            Notification::send($useraction      , new documentResponse($authUser->id,$operation,$useraction->full_name,$application->message));
            Mail::to($useraction->email)->send(new DocumentResponseMail($useraction->full_name,$operation,$application->message));
            Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
            Notification::send($controleur2, new documentAction($authUser->id,$operation,$useraction->full_name));
            Notification::send($controleur1, new documentAction($authUser->id,$operation,$useraction->full_name));
            return response()->json([
                'message' => 'la demandes a été bien modifier'
            ]);
        }

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
