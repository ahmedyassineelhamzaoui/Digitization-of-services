<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaimentStatus;
use App\Models\Paiment;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function notification(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'payment_id' => 'required',
                'credential_id' => 'required',
                'identifiant'  => 'required',
            ]);
  
            
            if ($validator->fails()) {
                return response()->json([
                        'response_code' => -2,
                        'response_message' => 'Certains champs requis sont manquants ou incorrects dans les données fournies. Veuillez vérifier les données et réessayer.'
                    ]);
            }
            $paymentNumber     = PaimentStatus::where('payment_id',$request->payment_id)->get();
            $credential_verify = PaimentStatus::where('credential_id',$request->credential_id)->get();
            if (count($paymentNumber)>0) {
                return response()->json([
                    "response_code" => -1,
                    "response_message" => "ce Identifiant de paiement : " . $request->payment_id . " existe déjà."
                ]);
            }else if(count($credential_verify)<1){
                return response()->json([
                    "response_code" => 0,
                    "response_message" => "Ce credential id : " . $request->credential_id . " n'a créé aucun paiement."
                ]);
            }else{
                $row = PaimentStatus::where('identifiant',$request->identifiant)->first();
                if(!$row){
                    return response()->json([
                        "response_code" => -3,
                        "response_message" => "L'identifiant que vous avez fourni n'éxiste pas"
                    ]); 
                }
                $row->payment_id = $request->payment_id;
                $row->statut = 'payé';
                $row->identifiant = $request->identifiant;
                
                $row->save();
                return response()->json([
                    "response_code" => 1,
                    "response_message" => "Traitement effectué avec succès."
                ]); 
            }
    }
    public function view(){
        return view('welcome');
    }
}