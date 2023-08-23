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

class FormController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }
        
        public function index()
        {
            return view('personelInfo');
        }
       
        public function storeInfo(Request $request, $personel_id)
        {
            
            if($request->has('print_info')){
                $special_id = decrypt($personel_id);
                $personelinfo = personelinfo::where('id',$special_id)->first();
                $previous =Previous::where('personelinfos_id',$special_id)->first();
                $current =Current::where('personelinfos_id',$special_id)->first();
                $conjoint =Conjoint::where('personelinfos_id',$special_id)->first();
                $pdrf = PDF::loadView('inscription',compact('personelinfo','previous','current','conjoint'));
                return $pdrf->download('inscription.pdf');
                // $output = $dompdf->output();
                // return response($output, 200)
                //         ->header('Content-Type', 'application/pdf')
                //         ->header('Content-Disposition', 'attachment; filename="inscription.pdf"');
                // return redirect()->back()->with('succès','votre demnade a été bien télecharger');
            }
            if($request->has('print_payment')){
                $paiment =Paiment::where('personelinfos_id',decrypt($personel_id))->first();
                $pdf = PDF::loadView('paiment',compact('paiment'));
                return $pdf->download('paiment.pdf');
            }

        }
        public function download($file)
        {
            
          if(Storage::disk('local')->exists("files/".$file)){
            $path = Storage::disk('local')->path("files/" . $file);
            $filename = basename($path);
            $headers = [
                'Content-Type' => mime_content_type($path),
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            return response()->download($path, $filename, $headers);
          }
          return view('errors.404');
        }
}
