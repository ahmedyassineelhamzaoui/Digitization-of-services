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
use PDF;
class applicationController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        $bottonName='';
        if($user->hasPermissionTo('modifier-demandes')){
            $applications = Application::join('users', 'applications.user_id', '=', 'users.id')
            ->select('applications.*', 'users.full_name')
            ->paginate(5);
            $names = [];
            $userPersonelinfos = []; 
            $files             = []; 
            $conjoints         = []; 
            $previouss         = []; 
            foreach($applications as $applicationName){
                $names[] = $applicationName->full_name;
                $userPersonelinfos []= Personelinfo::find($applicationName->id); 
                $files             []= File::where('personelinfos_id',$applicationName->id)->get(); 
                $conjoints         []= Conjoint::where('personelinfos_id',$applicationName->id)->get(); 
                $previouss         []= Previous::where('personelinfos_id',$applicationName->id)->get(); 
            }
            return view('layouts.dashboard.demand-dash',compact('files','userPersonelinfos','conjoints','applications','names','bottonName'));    
        }else{
            $applicationNames  =  $user->applications()->get();
            $names = [];
            $userPersonelinfos = []; 
            $files             = []; 
            $conjoints         = []; 
            $previouss         = []; 
            foreach($applicationNames as $applicationName){
                $user = User::find($applicationName->user_id);
                $names[] = $user->full_name;
                $userPersonelinfos []= Personelinfo::find($applicationName->id); 
                $files             []= File::where('personelinfos_id',$applicationName->id)->get(); 
                $conjoints         []= Conjoint::where('personelinfos_id',$applicationName->id)->get(); 
                $previouss         []= Previous::where('personelinfos_id',$applicationName->id)->get(); 
            
            }            
            $applications      = $user->applications()->paginate(5);
            return view('layouts.dashboard.demand-dash', compact('files','userPersonelinfos','conjoints','applications','names','bottonName')); 
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
            if($request->input('status_name') == 'accepter'){
                $application->status = 'en cours';
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
                Mail::to($useraction->email)->send(new DocumentResponseMail($useraction->full_name,$operation,$application->message));
                Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur2, new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur3, new documentAction($authUser->id,$operation,$useraction->full_name));
                // $basic  = new \Vonage\Client\Credentials\Basic("5755ed5b", "K6ep9r17WL0cb3UX");
                // $client = new \Vonage\Client($basic);
                //   $my_message   =   "Madame/Monsieur  ".$useraction->full_name." votre demande a été refusé. \n la raison : ".$application->message;
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS("212673816566", "ANL", $my_message)
                // );
                return response()->json([
                    'message' => 'la demandes a été bien modifier'
                ]);
            }
            
        }else
        if($authUser->roles[0]->name == 'controleur 2'){
            if($request->input('status_name') == 'accepter'){
                $application->status = 'en cours';
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
                Mail::to($useraction->email)->send(new DocumentResponseMail($useraction->full_name,$operation,$application->message));
                Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur1, new documentAction($authUser->id,$operation,$useraction->full_name));
                Notification::send($controleur3, new documentAction($authUser->id,$operation,$useraction->full_name));
                // $basic  = new \Vonage\Client\Credentials\Basic("5755ed5b", "K6ep9r17WL0cb3UX");
                // $client = new \Vonage\Client($basic);
                //    $my_message   =   "Madame/Monsieur  ".$useraction->full_name." votre demande a été refusé. \n la raison : ".$application->message;
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS("212673816566", "ANL", $my_message)
                // );
                return response()->json([
                    'message' => 'la demandes a été bien modifier'
                ]);
            }
        }else if($authUser->roles[0]->name == 'controleur 3'){
            $application->status = $request->input('status_name');
            $application->message = $request->comment;
            $application->save();
            $operation = $request->input('status_name');

            $personelinfo = personelinfo::where('id', $application->id)->first();
            $previous = Previous::where('personelinfos_id', $personelinfo->id)->first();
            $current = Current::where('personelinfos_id', $personelinfo->id)->first();
            $conjoint = Conjoint::where('personelinfos_id', $personelinfo->id)->first();
            $application = Application::find($application->id);
            $pdf = PDF::loadView('anl', compact('personelinfo', 'previous', 'current', 'conjoint', 'application'));
            
            $data["email"] = "marksemony@gmail.com";
            $data["title"] = "From ItSolutionStuff.com";
            $data["body"] = "This is Demo";
            $data["name"] =  $useraction->full_name;
            $data["operation"] = $operation;
            $data["message"] = $application->message;
    
            Mail::send('emails.responseOfApplication', $data, function($message)use($data, $pdf) {
                $message->from('ahmed.yassin.elhamzaoui2019@gmail.com')   // Add the "From" address
                        ->to($useraction->email, $useraction->email)
                        ->subject($data["title"])
                        ->attachData($pdf->output(), "reçu.pdf");   
            });

            Notification::send($useraction      , new documentResponse($authUser->id,$operation,$useraction->full_name,$application->message));
            Notification::send($admin      , new documentAction($authUser->id,$operation,$useraction->full_name));
            Notification::send($controleur2, new documentAction($authUser->id,$operation,$useraction->full_name));
            Notification::send($controleur1, new documentAction($authUser->id,$operation,$useraction->full_name));
            
            // $basic  = new \Vonage\Client\Credentials\Basic("5755ed5b", "K6ep9r17WL0cb3UX");
            // $client = new \Vonage\Client($basic);
            // if($operation == "accepter"){
            //   $my_message   =   "Madame/Monsieur  ".$useraction->full_name." votre demande a été accepté.";
            // }else{
            //   $my_message   =   "Madame/Monsieur  ".$useraction->full_name." votre demande a été refusé. \n la raison : ".$application->message;
            // }
            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS("212631800923", "ANL", $my_message)
            // );

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
    public function searchApplication(Request $request){
        
        $search = $request->search_demande;
        $user = auth()->user();

        if($user->hasPermissionTo('modifier-demandes')){

            $names = [];
            
            $userPersonelinfos = []; 
            $files = []; 
            $conjoints = []; 
            $previouss = []; 

            $roleName = auth()->user()->roles[0]->name;
            $applications = Application::join('users', 'applications.user_id', '=', 'users.id')
            ->select('applications.*', 'users.full_name')
            ->where('applications.status', 'like', '%' . $search . '%')
            ->orWhere('users.full_name', 'like', '%' . $search . '%')
            ->get();
            foreach($applications as $applicationName){
                $names            [] = $applicationName->full_name;
                $userPersonelinfos[] = Personelinfo::find($applicationName->id);
                $files            [] = File::where('personelinfos_id',$applicationName->id)->get(); 
                $conjoints        [] = Conjoint::find($applicationName->id);
                $previouss        [] = Previous::find($applicationName->id); 
            }
            if($applications)
            {
                return response()->json([
                    'files' => $files,
                    'userPersonelinfos' => $userPersonelinfos,
                    'conjoints' => $conjoints,
                    'applications' => $applications,
                    'names' => $names,
                    'roleName' => $roleName,
                    'action' => "{{route('send.Information')}}",
                ]);
            }
        }else{
            $names = [];
            $userPersonelinfos = []; 
            $files = []; 
            $conjoints = []; 
            $previouss = []; 

            $roleName = auth()->user()->roles[0]->name;
            
            $applications = Application::join('users', 'applications.user_id', '=', 'users.id')
            ->select('applications.*', 'users.full_name')
            ->where(function ($query) use ($search, $user) {
                $query->where('applications.status', 'like', '%' . $search . '%')
                    ->orWhere('users.full_name', 'like', '%' . $search . '%');
            })
            ->where('applications.user_id', $user->id)
            ->get();

            foreach($applications as $applicationName){
                $names[] = $applicationName->full_name;
                $userPersonelinfos[] = Personelinfo::find($applicationName->id);
                $files            [] = File::where('personelinfos_id',$applicationName->id)->get(); 
                $conjoints        [] = Conjoint::find($applicationName->id);
                $previouss        [] = Previous::find($applicationName->id); 
            }
            return response()->json([
                'files' => $files,
                'userPersonelinfos' => $userPersonelinfos,
                'conjoints' => $conjoints,
                'applications' => $applications,
                'names' => $names,
                'roleName' => $roleName,
                'action' => "{{route('send.Information')}}",
            ]);
        }
        
    }
            
}
