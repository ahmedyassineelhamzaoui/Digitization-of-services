<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin: 0; 
            padding: 0; 
            position: relative; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: 400px auto;
            background-image: url({{ public_path("assets/images/sonapie_home.png") }});
        }

        #image-container {
            position: absolute;
            top: 0;
            left: 0;
        }
        #image-container1 {
            position: absolute;
            top: -2%;
            left: 0;
        }
        h3{
            color:rgb(8, 149, 53) ;
        }

        #text-container {
            position: absolute;
            top: -2%;
            right: 0;
            text-align: center;
            width: 300px;
        }
        /* .first-tag {
            text-align: center;
        }

        .first-tag p {
            display: inline-block;
            margin: 10px;
        } */
    </style>
</head>
<body>

<div style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" >
    <img id="image-container " width="400px"  src="{{ public_path("assets/images/logo/logo1.jpg")}}" alt="">
    <div id="text-container"  style="text-align: center"><p>REPUBLIQUE DE COTE D'IVOIRE</p><p>Union-Discipline-Travail</p><p>------------</p></div>
    <h2 style="text-align: center;background-color: rgb(243, 163, 58);height:40px;line-height: 40px;align-items:center;    align-items: center;
    ">Reçu d'inscription</h2>
    <h3 style="text-decoration: underline">Les informations personnelles :</h3> 
            <div class="">
                <pre><span style="font-weight: bold;">Matricule : </span> {{$personelinfo->matricule}}<span style="font-weight: bold">            Nom :</span>  {{$personelinfo->nom }}<span style="font-weight: bold">            Prénom : </span> {{$personelinfo->prenom}}</pre> 
            </div>
            <div class="">
                <pre><span style="font-weight: bold">Date naissance :</span> {{$personelinfo->date_naissance}} <span style="font-weight: bold">         Lieu de naissance : </span> {{$personelinfo->lieu_naissance}} </pre>
            </div>
            <div class="">
                <pre><span style="font-weight: bold" >Sexe : </span> {{$personelinfo->sexe}} <span><span style="font-weight: bold" >         Email : </span> {{$personelinfo->email}}</pre>
            </div>
            <div class="">
                <pre><span style="font-weight: bold" >Téléphone : </span> {{$personelinfo->telephone}} <span style="font-weight: bold" >        Adresse :</span> {{$personelinfo->adresse}}</pre>
            </div>
            <div>
                <pre><span style="font-weight: bold" >Région : </span> {{$personelinfo->region}} <span style="font-weight: bold" >              Localité : </span>{{$personelinfo->localite}}</pre>
            </div>
            <div class="">
                <pre><span style="font-weight: bold" >Type de pièce :</span> {{$personelinfo->type_piece}}<span style="font-weight: bold" >           Numéro de la pièce : </span>{{$personelinfo->numero_piece}}</pre>
            </div>

        <div class="">
            <pre><span style="font-weight: bold" >Corps Antérieur : </span>{{$personelinfo->corps_anterieur}} <span style="font-weight: bold" >Corps : </span>  {{$personelinfo->Corps}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Ministère Antérieur : </span>{{$personelinfo->minstere_anterieur}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Ministère : </span>{{$personelinfo->minstere}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Fonction Antérieur :</span> {{$personelinfo->fonction_anterieur}}</pre>   
        </div>
        <div>
            <pre><span style="font-weight: bold" >Fonction : </span> {{$personelinfo->fonction}} </pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Service / Etablissement : </span>{{$personelinfo->service}} </pre>            
        </div>
        <div>
            <pre><span style="font-weight: bold" >Décret/Arret : </span>{{$personelinfo->arret}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Date nommination : </span>{{$personelinfo->date_nomination}} <span style="font-weight: bold" >          Date d'effet : </span>{{$personelinfo->date_effet}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Date de fin : </span>{{$personelinfo->date_fin}} <span style="font-weight: bold" >           Situation matrimoniale : </span>{{$personelinfo->situation_matrimoniale}}</pre>            
        </div>
        <div style="height: 100px">

        </div>
        <img id="image-container" width="400px"  src="{{ public_path("assets/images/logo/logo1.jpg")}}" alt="">
        <div id="text-container"  style="text-align: center"><p>REPUBLIQUE DE COTE D'IVOIRE</p><p>Union-Discipline-Travail</p><p>------------</p></div>    
        <h3 style="text-decoration: underline">Informations conjoint.e</h3>
        <div class="">
            <pre><span style="font-weight: bold" >Nom et Prénom : </span>{{$conjoint->nom_prenom}} <span style="font-weight: bold" >          Fonction :  </span>{{$conjoint->fonction}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Matricule  : </span>{{$conjoint->matricule_Conjoint}} <span style="font-weight: bold" >           Service employeur  :  </span>{{$conjoint->service_empolyeur}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Date d'embauche  : </span>{{$conjoint->date_embauche}} <span style="font-weight: bold" >          Adresse :  </span>{{$conjoint->adress_conjoint}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Régime  : </span>{{$conjoint->regime}}</pre>            
        </div>
        <div>
            <pre><span style="font-weight: bold" >Taux d'indemnité  :  </span>{{$conjoint->taux_indemnite}}</pre>
        </div>
        @if($previous->ville_precedant)
        <h3 style="text-decoration: underline">Habitation précédante</h3>
        <div class="">
            <pre><span style="font-weight: bold" >Ville : </span>{{$previous->ville_precedant}} <span style="font-weight: bold" >          Quartier :  </span>{{$previous->quartier_precedant}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Lot n° : </span>{{$previous->lot_precedant}} <span style="font-weight: bold" >          Date libération :  </span>{{$previous->date_liberation}}</pre>            
        </div>
        @endif
        <h3 style="text-decoration: underline">Habitation actuelle</h3>
        <div class="">
            <pre><span style="font-weight: bold" >Ville : </span>{{$current->ville_actuelle}} <span style="font-weight: bold" >          Quartier :  </span>{{$current->quartier_actuelle}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Lot n° : </span>{{$current->lot_actuelle}} <span style="font-weight: bold" >          Date d'occupation :  </span>{{$current->date_occupation}}</pre>            
        </div>
        <div class="">
            <label class="form-label">Etes-vous hébergé par un parent ou un ami ?</label>
            <div class="form-check">
                @if($current->nom_parent)
                <input class="form-check-input" type="radio" name="gridRadios" id="response-oui" value="oui" checked>
                <label class="form-check-label" for="response-oui">
                Oui
                </label>
                @else
                <input class="form-check-input" type="radio" name="gridRadios" id="response-oui" value="oui" >
                <label class="form-check-label" for="response-oui">
                Oui
                </label>
                @endif
            </div>
            <div class="form-check">
                @if(!$current->nom_parent)
                <input class="form-check-input" type="radio" name="gridRadios" id="response-non" value="non" checked>
                <label class="form-check-label" for="response-non">
                Non
                </label>
                @else
                <input class="form-check-input" type="radio" name="gridRadios" id="response-non" value="non" >
                <label class="form-check-label" for="response-non">
                Non
                </label>
                @endif
            </div>
        </div>
        <div class="">
            @if($current->nom_parent)
            <pre><span style="font-weight: bold" >Nom de ce parent ou ami : </span> {{$current->nom_parent}}</pre>
            @endif
        </div>
</div>
</body>
</html>
