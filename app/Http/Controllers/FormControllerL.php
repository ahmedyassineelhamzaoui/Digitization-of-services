<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormControllerL extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('personelInfoL');
    }
    public function storeInfo(Request $request, $personel_id)
    {
        
        if($request->has('print_info')){
            $special_id = decrypt($personel_id);
            $personelinfo = personelinfo::where('id',$special_id)->first();
            $previous =Previous::where('personelinfos_id',$special_id)->first();
            $current =Current::where('personelinfos_id',$special_id)->first();
            $conjoint =Conjoint::where('personelinfos_id',$special_id)->first();
            $pdrf = PDF::loadView('inscription_Formulaire_L',compact('personelinfo','previous','current','conjoint'));
            return $pdrf->download('inscription_Formulaire_L.pdf');
            // $output = $dompdf->output();
            // return response($output, 200)
            //         ->header('Content-Type', 'application/pdf')
            //         ->header('Content-Disposition', 'attachment; filename="inscription.pdf"');
            // return redirect()->back()->with('succès','votre demnade a été bien télecharger');
        }
        if($request->has('print_payment')){
            $paiment =Paiment::where('personelinfos_id',decrypt($personel_id))->first();
            $pdf = PDF::loadView('paiment_L',compact('paiment'));
            return $pdf->download('paiment_L.pdf');
        }

    }
}
