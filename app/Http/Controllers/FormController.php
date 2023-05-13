<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Conjoint;
use App\Models\Current;
use App\Models\Join;
use App\Models\Personeinfo;
use App\Models\Previous;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function storeInformation(Request $request)
    {
        $request->validate([
           'input_matricule' => 'required',
           'input_nom' => 'required',
           'input_prenom' => 'required',
           'input_datenaissance' => 'required',
           'input_email' => 'required',
           'input_telephone' => 'required',
           'input_adresse' => 'required',
           'input_numeropiece' => 'required',
           'input_infoFonctionAnterieur' => 'required',
           'input_infoFonction' => 'required',
           'input_service' => 'required',
           'input_arret' => 'required',
           'input_nomination' => 'required',
           'input_effet' => 'required',
           'input_fin' => 'required',
        ]);
        $request->create([
           'matricule' => $request->input_matricule ,
           'nom' => $request->input_nom ,
           'prenom' => $request->input_prenom ,
           'sexe' => $request->form_sexe ,
           'date_naissance' => $request->input_datenaissance ,
           'lieu_naissance' => $request->input_lieunaissance ,
           'email' => $request->input_email ,
           'telephone' => $request->input_telephone ,
           'adresse' => $request->input_adresse ,
           'type_piece' => $request->input_typepiece ,
           'numero_piece' => $request->input_numeropiece ,
           'region' => $request->input_region ,
           'localite' => $request->input_localite ,
           'corps_anterieur' => $request->input_corsauntirieur ,
           'corps' => $request->input_corps ,
           'minstere_anterieur' => $request->input_minstereAnterieur ,
           'minstere' => $request->input_minstere ,
           'fonction' => $request->input_infoFonction ,
           'fonction_anterieur' => $request->input_infoFonctionAnterieur ,
           'service' => $request->input_service ,
           'arret' => $request->input_arret ,
           'date_nomination' => $request->input_nomination ,
           'date_effet' => $request->input_effet ,
           'situation_matrimoniale' => $request->input_fin ,
        ]);
        return response()->json([
            'message' => 'info created successfuly'
        ]);

    }
}
