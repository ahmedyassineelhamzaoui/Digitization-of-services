<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Conjoint;
use App\Models\Current;
use App\Models\File;
use App\Models\Personelinfo;
use App\Models\Previous;
use App\Models\Paiment;
use App\Models\PaimentStatus;
use App\Models\Application;
use Dompdf\Dompdf;
use App\Notifications\documentAdded;
use Illuminate\Support\Facades\Notification;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PDF;
use Illuminate\Support\Facades\Storage;
// use App\Mail\OrderCreated;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;



use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormControllerRQ extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {                
            return view('personelInfoRQ');
        }
           public function storeInfo(Request $request, $personel_id)
        {
            
            if($request->has('print_info')){
                $special_id = decrypt($personel_id);
                $personelinfo = personelinfo::where('id',$special_id)->first();
                $previous =Previous::where('personelinfos_id',$special_id)->first();
                $current =Current::where('personelinfos_id',$special_id)->first();
                $conjoint =Conjoint::where('personelinfos_id',$special_id)->first();
                $pdrf = PDF::loadView('inscription_Formulaire_R',compact('personelinfo','previous','current','conjoint'));
                return $pdrf->download('inscription_Formulaire_R.pdf');
                // $output = $dompdf->output();
                // return response($output, 200)
                //         ->header('Content-Type', 'application/pdf')
                //         ->header('Content-Disposition', 'attachment; filename="inscription.pdf"');
                // return redirect()->back()->with('succès','votre demnade a été bien télecharger');
            }

        }
}
