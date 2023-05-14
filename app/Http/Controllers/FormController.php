<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Conjoint;
use App\Models\Current;
use App\Models\Join;
use App\Models\personelinfo;
use App\Models\Previous;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
        public function storeInformation(Request $request)
        {
            $validator = $request->validate([
            'registration_number' => 'required|string',
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'birth_date' => 'required',
            'person_email' => 'required|email',
            'person_telephone' => 'required|string',
            'person_adresse' => 'required|string|min:10',
            'document_number' => 'required',
            'previous_job' => 'required|string|min:4',
            'person_job' => 'required|string|min:4',
            'person_service' => 'required|string|min:4',
            'person_judgment' => 'required|string|min:4',
            'person_nomination' => 'required',
            'effective_date' => 'required',
            'end_date' => 'required',
            'full_name' => 'required',
            'spouse_job' => 'required',
            'spouse_registrationNumber' => 'required',
            'employer_department' => 'required',
            'hire_date' => 'required',
            'spouse_job' => 'required',
            'spouse_regime' => 'required',
            'compensation_rate' => 'required',
            'previous_city' => 'required',
            'previous_neighborhood' => 'required',
            'previous_batch' => 'required',
            'release_date' => 'required',
            'current_city' => 'required',
            'current_neighborhood' => 'required',
            'curent_batch' => 'required',
            'occupancy_date' => 'required'
            ]);
            // if ($validator->fails()) {
            //     return response()->json([
            //         'success' => false,
            //         'errors' => $validator->errors(),
            //     ], 422);
            // }
            $personelinfo=personelinfo::create([
            'matricule' => $request->registration_number ,
            'nom' => $request->first_name ,
            'prenom' => $request->last_name ,
            'sexe' => $request->person_sexe ,
            'date_naissance' => $request->birth_date ,
            'lieu_naissance' => $request->place_birth ,
            'email' => $request->person_email ,
            'telephone' => $request->person_telephone ,
            'adresse' => $request->person_adresse ,
            'type_piece' => $request->document_type ,
            'numero_piece' => $request->document_number ,
            'region' => $request->person_region ,
            'localite' => $request->person_locality ,
            'corps_anterieur' => $request->anterior_body ,
            'corps' => $request->person_body,
            'minstere_anterieur' => $request->previous_ministry ,
            'minstere' => $request->person_ministry ,
            'fonction' => $request->person_job ,
            'fonction_anterieur' => $request->previous_job ,
            'service' => $request->person_service ,
            'arret' => $request->person_judgment ,
            'date_nomination' => $request->person_nomination ,
            'date_effet' => $request->effective_date ,
            'date_fin' => $request->end_date ,
            'situation_matrimoniale' => $request->marital_status ,
            ]);

            Conjoint::create([
                'personelinfos_id' => $personelinfo->id,
                'nom_prenom' => $request->full_name,
                'fonction' => $request->spouse_job,
                'matricule_Conjoint' => $request->spouse_registrationNumber,
                'service_empolyeur' => $request->employer_department,
                'date_embauche' => $request->hire_date,
                'adress_conjoint' => $request->spouse_job,
                'regime' => $request->spouse_regime,
                'taux_indemnite' => $request->compensation_rate
            ]);
            Previous::create([
                'personelinfos_id' => $personelinfo->id,
                'ville_precedant' => $request->previous_city ,
                'quartier_precedant' => $request->previous_neighborhood ,
                'lot_precedant' => $request->previous_batch ,
                'date_liberation' => $request->release_date 
            ]);
            Current::create([
                'personelinfos_id' => $personelinfo->id,
                'ville_actuelle' => $request->current_city,
                'quartier_actuelle' => $request->current_neighborhood,
                'lot_actuelle' => $request->curent_batch,
                'date_occupation' => $request->occupancy_date,
                'nom_parent' => $request->parent_name
            ]);
            return response()->json([
                'message' => 'info created successfuly'
            ],200);

        }
}
