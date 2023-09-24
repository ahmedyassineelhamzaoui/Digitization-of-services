<?php

namespace App\Http\Livewire;

use Livewire\Component;
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
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\models\Quartier;
use App\models\Ville;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $curentStep=1;
    public $totalSteps=3;

    //user info
    public $Matricule;
    public $Nom;
    public $Prenom;
    public $person_sexe;
    public $date_de_naissance;
    public $place_birth;
    public $email;
    public $télephone;
    public $adresse;
    public $document_type;
    public $Numéro_du_pièce;
    public $person_region;
    public $person_locality;
    public $anterior_body;
    public $person_body;
    public $previous_ministry;
    public $person_ministry;
    public $Fonction_Antérieur = null;
    public $Fonction;
    public $Service_Etablissement;
    public $Arret;
    public $Date_nomination;
    public $Date_effet;
    public $Date_fin;
    public $marital_status;
    public $Nom_Prénom;
    public $Conjoint_Fonction;
    public $Conjoint_Matricule;
    public $Service_employeur;
    public $Date_embauche;
    public $Conjoint_adresse;
    public $Conjoint_régime;
    public $Taux_indemnité;
    public $villePrecedant = null;
    public $quartier_précédant;
    public $lot_n°_précédant;
    public $Date_libération;
    public $ville_actuelle;
    public $quartier_actuelle;
    public $lot_n°_actuelle;
    public $Date_occupation;
    public $hébergement = 'non';
    public $parent_name;
    // files
    public $Décision_de_nomination;
    public $Décision_affectation;
    public $Certificat_de_1ère_prise_de_service;
    public $Bulletin_de_solde_avant_nomination;
    public $Bulletin_de_solde_après_nommination;
    public $Certificat_de_non_hébergement;
    public $Attestation_sur_honneur_légalisée;
    public $certificat_de_résidence;
    public $Pièce_identité;
    public $Acte_de_mariage;

    //payment
    public $nom_paiment; 
    public $prenom_paiment; 
    public $telephone_paiment; 
    public $credential_paiment;
    public $nature_recette;
    public $numéro_avis_de_recette;
    public $montant_total;

    public $displayerrors = false;
    public $errormessage = '';
     
    public $isLoading = false;

    public $quartiers = null;

    
    public function render()
    {
        return view('livewire.multi-step-form',[
            'cities' => Ville::all(),
        ]);
    }
    public function decreseStep()
    {
        $this->resetErrorBag();
        $this->curentStep--;
        if($this->curentStep<1){
            $this->curentStep =1;
        }
    }
    public function increseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->curentStep++;
        if($this->curentStep > $this->totalSteps){
            $this->curentStep = $this->totalSteps;
        }
    }
    public function validateData()
    {
        if($this->curentStep == 1){
            $this->validate([
                'Matricule' => 'required|string',
                'Nom' => 'required|string|min:2',
                'Prenom' => 'required|string|min:2',
                'date_de_naissance' => 'required',
                'email' => 'required|email',
                'télephone' => 'required|string',
                'adresse' => 'required|string|min:10',
                'Numéro_du_pièce' => 'required',
                'Fonction' => 'required|string|min:4',
                'Service_Etablissement' => 'required|string|min:4',
                'Arret' => 'required|string|min:4',
                'Date_nomination' => 'required',
                'Date_effet' => 'required',
                'Date_fin' => 'required',
                'Nom_Prénom' => 'required',
                'Conjoint_Fonction' => 'required',
                'Conjoint_Matricule' => 'required',
                'Service_employeur' => 'required',
                'Date_embauche' => 'required',
                'Conjoint_adresse' => 'required',
                'Conjoint_régime' => 'required',
                'Taux_indemnité' => 'required',
                'villePrecedant' => 'required',
                'quartier_précédant' => 'required',
                'lot_n°_précédant' => 'required',
                'Date_libération' => 'required',
                'ville_actuelle' => 'required',
                'quartier_actuelle' => 'required',
                'lot_n°_actuelle' => 'required',
                'Date_occupation' => 'required'
            ]);
        }else if($this->curentStep == 2){
            $this->validate([
                'Décision_de_nomination' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Décision_affectation' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Certificat_de_1ère_prise_de_service' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Bulletin_de_solde_avant_nomination' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Bulletin_de_solde_après_nommination' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Certificat_de_non_hébergement' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Attestation_sur_honneur_légalisée' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'certificat_de_résidence' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Pièce_identité' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'Acte_de_mariage' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            ]);
        }else if($this->curentStep == 3){
            $this->validate([
                'nom_paiment' => 'required',
                'prenom_paiment' => 'required',
                'credential_paiment' => 'required',
                'nature_recette' => 'required',
                'numéro_avis_de_recette' => 'required',
            ]);
        }
    }

    public function storeInfo()
    {
        $this->isLoading = true;
        $this->resetErrorBag();
        $this->validateData();
        
        
                $url="https://wbservice.tresor.gouv.ci/wbpartenaires/tstrest/GenererAvisrecette";

                $data = [
                    'action' => 'GenererAvisrecette',
                    'credential_id' => $this->credential_paiment,
                    'client_nom' => $this->nom_paiment,
                    'client_prenom' => $this->prenom_paiment,
                    'identifiant' => $this->numéro_avis_de_recette,
                    'nature_recette' => $this->nature_recette,
                    'montant_total' => $this->montant_total,
                    'telephone' => $this->telephone_paiment,
                ];

                $client = new Client();
                $response = $client->post($url, [
                    'form_params' => $data,
                ]);

                $responseData = $response->getBody()->getContents();
                $responseMesssage = json_decode($responseData, true)['response_message'];
                $responseCode = json_decode($responseData, true)['response_code'];
                if ($responseCode == 1) {       
                    
                    $personelinfo=personelinfo::create([
                        'matricule' => strtoupper($this->Matricule),
                        'nom' => strtoupper($this->Nom ),
                        'prenom' => strtoupper($this->Prenom ),
                        'sexe' => strtoupper($this->person_sexe ),
                        'date_naissance' => strtoupper($this->date_de_naissance ),
                        'lieu_naissance' => strtoupper($this->place_birth ),
                        'email' => strtoupper($this->email ),
                        'telephone' => strtoupper($this->télephone ),
                        'adresse' => strtoupper($this->adresse ),
                        'type_piece' => strtoupper($this->document_type ),
                        'numero_piece' => strtoupper($this->Numéro_du_pièce ),
                        'region' => strtoupper($this->person_region ),
                        'localite' => strtoupper($this->person_locality ),
                        'corps_anterieur' => strtoupper($this->anterior_body ),
                        'corps' => strtoupper($this->person_body),
                        'minstere_anterieur' => strtoupper($this->previous_ministry ),
                        'minstere' => strtoupper($this->person_ministry ),
                        'fonction' => strtoupper($this->Fonction ),
                        'fonction_anterieur' => strtoupper($this->Fonction_Antérieur ),
                        'service' => strtoupper($this->Service_Etablissement ),
                        'arret' => strtoupper($this->Arret ),
                        'date_nomination' => strtoupper($this->Date_nomination ),
                        'date_effet' => strtoupper($this->Date_effet ),
                        'date_fin' => strtoupper($this->Date_fin ),
                        'situation_matrimoniale' => strtoupper($this->marital_status ),
                    ]);
                    Conjoint::create([
                        'personelinfos_id' => $personelinfo->id,
                        'nom_prenom' => strtoupper($this->Nom_Prénom),
                        'fonction' => strtoupper($this->Conjoint_Fonction),
                        'matricule_Conjoint' => strtoupper($this->Conjoint_Matricule),
                        'service_empolyeur' => strtoupper($this->Service_employeur),
                        'date_embauche' => strtoupper($this->Date_embauche),
                        'adress_conjoint' => strtoupper($this->Conjoint_adresse),
                        'regime' => strtoupper($this->Conjoint_régime),
                        'taux_indemnite' => strtoupper($this->Taux_indemnité)
                    ]);
                    Previous::create([
                        'personelinfos_id' => $personelinfo->id,
                        'ville_precedant' => strtoupper($this->villePrecedant ),
                        'quartier_precedant' => strtoupper($this->quartier_précédant ),
                        'lot_precedant' => strtoupper($this->lot_n°_précédant ),
                        'date_liberation' => strtoupper($this->Date_libération)
                    ]);
                    Current::create([
                        'personelinfos_id' => $personelinfo->id,
                        'ville_actuelle' => strtoupper($this->ville_actuelle),
                        'quartier_actuelle' => strtoupper($this->quartier_actuelle),
                        'lot_actuelle' => strtoupper($this->lot_n°_actuelle),
                        'date_occupation' => strtoupper($this->Date_occupation),
                        'nom_parent' => strtoupper($this->parent_name)
                    ]);                       
                        $nomination = Str::random(10).$this->Décision_de_nomination->getClientOriginalName();
                        $this->Décision_de_nomination->storeAs('files',$nomination);
            
                        $affectation = Str::random(10).$this->Décision_affectation->getClientOriginalName();
                        $this->Décision_affectation->storeAs('files',$affectation);
            
                        $prise_de_service = Str::random(10).$this->Certificat_de_1ère_prise_de_service->getClientOriginalName();
                        $this->Certificat_de_1ère_prise_de_service->storeAs('files',$prise_de_service);
            
                        $solde_avant_nomination = Str::random(10).$this->Bulletin_de_solde_avant_nomination->getClientOriginalName();
                        $this->Bulletin_de_solde_avant_nomination->storeAs('files',$solde_avant_nomination);
                        
                        $Bulletin_de_solde_après = Str::random(10).$this->Bulletin_de_solde_après_nommination->getClientOriginalName();
                        $this->Bulletin_de_solde_après_nommination->storeAs('files',$Bulletin_de_solde_après);
                       
                        $non_hébergement = Str::random(10).$this->Certificat_de_non_hébergement->getClientOriginalName();
                        $this->Certificat_de_non_hébergement->storeAs('files',$non_hébergement);
                       
                        $Attestation_honneur = Str::random(10).$this->Attestation_sur_honneur_légalisée->getClientOriginalName();
                        $this->Attestation_sur_honneur_légalisée->storeAs('files',$Attestation_honneur);
                       
                        $certificat_résidence = Str::random(10).$this->certificat_de_résidence->getClientOriginalName();
                        $this->certificat_de_résidence->storeAs('files',$certificat_résidence);
            
                        $piecei_dentite = Str::random(10).$this->Pièce_identité->getClientOriginalName();
                        $this->Pièce_identité->storeAs('files',$piecei_dentite);
            
                        $acte_mariage = Str::random(10).$this->Acte_de_mariage->getClientOriginalName();
                        $this->Acte_de_mariage->storeAs('files',$acte_mariage);
            
                        File::create([
                            'personelinfos_id' => $personelinfo->id,
                            'decisionnomination_path' => $nomination,
                            'decisionaffectation_path' => $affectation,
                            'certificatpriseservice_path' => $prise_de_service,
                            'Bulletinsoldeavant_path' => $solde_avant_nomination,
                            'Bulletinsoldeapres_path' => $Bulletin_de_solde_après,
                            'certifcatnomhebergement_path' => $non_hébergement,
                            'attestationhonneurlegalise_path' => $Attestation_honneur,
                            'certificatresidence_path' => $certificat_résidence,
                            'pieceidentite_path' => $piecei_dentite,
                            'actemariage_path' => $acte_mariage,
                        ]);
                        Paiment::create([
                            'personelinfos_id'  => $personelinfo->id,
                            'client_nom'        => $this->nom_paiment,
                            'client_prenom'     => $this->prenom_paiment,
                            'credential_id'     => $this->credential_paiment,
                            'telephone'         => $this->telephone_paiment,
                            'identifiant'       => $this->numéro_avis_de_recette,
                            'nature_recette'    => $this->nature_recette,
                            'montant_total'     => $this->montant_total,
                         ]);
                        PaimentStatus::create([
                            'personelinfos_id' => $personelinfo->id,
                            'statut' => 'en cours',
                            'credential_id' => $this->credential_paiment,
                            'identifiant' => $this->numéro_avis_de_recette,
                            'payment_id' => '',
                        ]);
                        $application = new Application();
                        $application->id = $personelinfo->id;
                        $application->type = "A";
                        $application->status ='en attente';
                        $application->user_id =auth()->user()->id;
                        $application->editable1 = 'yes';
                        $application->save();
                        $this->reset();

                    $user = auth()->user();
                    $admin       = User::role('Administrateur')->first();
                    $controleur1 = User::role('controleur 1')->first();
                    $controleur2 = User::role('controleur 2')->first();
                    $controleur3 = User::role('controleur 3')->first();

                    Notification::send($admin      , new documentAdded($user->id));
                    Notification::send($controleur1, new documentAdded($user->id));
                    Notification::send($controleur2, new documentAdded($user->id));
                    Notification::send($controleur3, new documentAdded($user->id));

                    Mail::to($user->email)->send(new WelcomeEmail($user,$personelinfo->id));
                    $this->isLoading = false;
                    return redirect()->route('demande')->with('success','votre demande a été créer avec succés');
                }
                else {
                     $this->displayerrors = true;
                     $this->errormessage = $responseMesssage;
                     $this->isLoading = false;
                }
    }
    public function mount()
    {
        $this->curentStep =1;
    }

    
}
