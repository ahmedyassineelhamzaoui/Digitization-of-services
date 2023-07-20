<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Conjoint;
use App\Models\Current;
use App\Models\File;
use App\Models\Personelinfo;
use App\Models\Previous;
use App\Models\Paiment;
use App\Models\Application;
use Dompdf\Dompdf;
use App\Notifications\documentAdded;
use Illuminate\Support\Facades\Notification;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\OrderCreated;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;



use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
        public $count = 0;
        public function __construct()
        {
            $this->middleware('auth');
        }
       public function index()
       {
           return view('personelInfo');
       }

        public function storeInformation(Request $request)
        {

            if($request->has('registration_number')){
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
                    'message' => 'les information a été bien créer',
                    'personel_id' => $personelinfo->id,
             ]);

            }
            if($request->has('appointment_decision')){

                $request->validate([
                    'appointment_decision' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'assignment_decision' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'service_certificate' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'before_appointment' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'after_appointment' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'nonaccommodation_certificate' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'sworn_statement' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'residence_certificate' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'identity_document' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                    'marriage_certificate' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                ]);


                  $appointmentDecisionPath = $request->file('appointment_decision');
                  $assignmentDecisionPath = $request->file('assignment_decision');
                  $serviceCertificatePath = $request->file('service_certificate');
                  $beforeAppointmentPath = $request->file('before_appointment');
                  $afterAppointmentPath = $request->file('after_appointment');
                  $nonaccommodationCertificatePath = $request->file('nonaccommodation_certificate');
                  $swornStatementPath = $request->file('sworn_statement');
                  $residenceCertificatePath = $request->file('residence_certificate');
                  $identityDocumentPath = $request->file('identity_document');
                  $marriageCertificatePath = $request->file('marriage_certificate');


                  $filename1 = $appointmentDecisionPath->hashName();
                  $filename2 = $assignmentDecisionPath->hashName();
                  $filename3 = $serviceCertificatePath->hashName();
                  $filename4 = $beforeAppointmentPath->hashName();
                  $filename5 = $afterAppointmentPath->hashName();
                  $filename6 = $nonaccommodationCertificatePath->hashName();
                  $filename7 = $swornStatementPath->hashName();
                  $filename8 = $residenceCertificatePath->hashName();
                  $filename9 = $identityDocumentPath->hashName();
                  $filename10 = $marriageCertificatePath->hashName();

                  $appointmentDecisionPath->move('uploads',$filename1);
                  $assignmentDecisionPath->move('uploads',$filename2);
                  $serviceCertificatePath->move('uploads',$filename3);
                  $beforeAppointmentPath->move('uploads',$filename4);
                  $afterAppointmentPath->move('uploads',$filename5);
                  $nonaccommodationCertificatePath->move('uploads',$filename6);
                  $swornStatementPath->move('uploads',$filename7);
                  $residenceCertificatePath->move('uploads',$filename8);
                  $identityDocumentPath->move('uploads',$filename9);
                  $marriageCertificatePath->move('uploads',$filename10);


                  File::create([
                    'personelinfos_id' => $request->personel_id ,
                    'decisionnomination_path' => 'uploads/'.$filename1,
                    'decisionaffectation_path' => 'uploads/'.$filename2,
                    'certificatpriseservice_path' => 'uploads/'.$filename3,
                    'Bulletinsoldeavant_path' => 'uploads/'.$filename4,
                    'Bulletinsoldeapres_path' =>'uploads/'.$filename5,
                    'certifcatnomhebergement_path' => 'uploads/'.$filename6,
                    'attestationhonneurlegalise_path' => 'uploads/'.$filename7,
                    'certificatresidence_path' => 'uploads/'.$filename8,
                    'pieceidentite_path' => 'uploads/'.$filename9,
                    'actemariage_path' => 'uploads/'.$filename10,
                  ]);

                  return response()->json(['message' => 'Les fichiers ont été bien joints.']);
            }
            if($request->has('telephone_paiment')){

                 $request->validate([
                     'nom_paiment' => 'required',
                     'prenom_paiment' => 'required',
                     'credential_paiment' => 'required',
                     'nature_paiment' => 'required',
                     'number_paiment' => 'required',
                 ]);
                 $response = Http::post('https://wbservice.tresor.gouv.ci/wbpartenaires/tstrest/GenererAvisrecette', [
                    'action'         => 'GenererAvisrecette',
                    'client_nom'     => $request->nom_paiment,
                    'client_prenom'  => $request->prenom_paiment,
                    'credential_id'  => $request->credential_paiment,
                    'telephone'      => $request->telephone_paiment,
                    'identifiant'    => $request->number_paiment,
                    'nature_recette' => $request->nature_paiment,
                    'montant_total'  => $request->payment_total,
                ]);
                $url="https://wbservice.tresor.gouv.ci/wbpartenaires/tstrest/GenererAvisrecette";

                $data = [
                    'action' => 'GenererAvisrecette',
                    'credential_id' => 'pJft51_4M6Cbbnsfw',
                    'client_nom' => 'ouattara',
                    'client_prenom' => 'hervé',
                    'identifiant' => 'UYDU34H',
                    'nature_recette' => 'EXAMEN 190',
                    'montant_total' => '100',
                    'telephone' => '0707186705',
                ];

                $client = new Client();
                $response = $client->post($url, [
                    'form_params' => $data,
                ]);

                $responseData = $response->getBody()->getContents();
                $responseMesssage = json_decode($responseData, true)['response_message'];
                $responseCode = json_decode($responseData, true)['response_code'];

                dd($responseCode == 1);
                if ($responseCode == 1) {
                    $application = new Application();
                    $application->id = $request->personel_id;
                    $application->status ='en attente';
                    $application->user_id =auth()->user()->id;
                    $application->editable1 = 'yes';
                    $application->save();
                    Paiment::create([
                        'personelinfos_id'  => $request->personel_id,
                        'client_nom'        => $request->nom_paiment,
                        'client_prenom'     => $request->prenom_paiment,
                        'credential_id'     => $request->credential_paiment,
                        'telephone'         => $request->telephone_paiment,
                        'identifiant'       => $request->number_paiment,
                        'nature_recette'    => $request->nature_paiment,
                        'montant_total'     => $request->payment_total,
                     ]);

                    $user = auth()->user();
                    $admin       = User::role('Administrateur')->first();
                    $controleur1 = User::role('controleur 1')->first();
                    $controleur2 = User::role('controleur 2')->first();
                    $controleur3 = User::role('controleur 3')->first();

                    Notification::send($admin      , new documentAdded($user->id));
                    Notification::send($controleur1, new documentAdded($user->id));
                    Notification::send($controleur2, new documentAdded($user->id));
                    Notification::send($controleur3, new documentAdded($user->id));

                    Mail::to($user->email)->send(new WelcomeEmail($user,$request->personel_id));

                    return response()->json([
                    'message' => 'paiment a été créer avec succés',
                    'number'  => 1
                    ]);

                } else {
                    return response()->json([
                        'message' => $responseMesssage,
                        'number' => $responseCode
                    ]);
                }
            }
            if($request->has('print_info')){

                $personelinfo = personelinfo::where('id',$request->personel_id)->first();
                $previous =Previous::where('personelinfos_id',$request->personel_id)->first();
                $current =Current::where('personelinfos_id',$request->personel_id)->first();
                $conjoint =Conjoint::where('personelinfos_id',$request->personel_id)->first();
                // dd($data);
                $dompdf = new Dompdf();

                // Render the view as HTML
                $html = view('inscription', compact('personelinfo','previous','current','conjoint'))->render();

                // Load the HTML into dompdf
                $dompdf->loadHtml($html);

                // Set the paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // Render the PDF
                $dompdf->render();
                $output = $dompdf->output();
                return response($output, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="inscription.pdf"');
                return redirect()->back()->with('succès','votre commande a été bien télecharger');
            }
            if($request->has('print_payment')){

                $paiment =Paiment::where('personelinfos_id',$request->personel_id)->first();
                // dd($data);
                $dompdf = new Dompdf();

                // Render the view as HTML
                $html = view('paiment', compact('paiment'))->render();

                // Load the HTML into dompdf
                $dompdf->loadHtml($html);

                // Set the paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // Render the PDF
                $dompdf->render();
                $output = $dompdf->output();

                return response($output, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="paiment.pdf"');
                return redirect()->back()->with('succès','votre commande a été bien télecharger');
            }

        }

}
