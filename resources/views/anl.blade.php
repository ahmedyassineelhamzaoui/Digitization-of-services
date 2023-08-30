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
        .signature{
            position: absolute;
            bottom: 2%;
            right:0;
        }
        .tempo{
            position: absolute;
            bottom: 2%;
            left:20%;
        }
    </style>
</head>
<body>

<div style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" >
    <img id="image-container " width="400px"  src="{{ public_path("assets/images/logo/logo1.jpg")}}" alt="">
    <div id="text-container"  style="text-align: center"><p>REPUBLIQUE DE COTE D'IVOIRE</p><p>Union-Discipline-Travail</p><p>------------</p></div>
    <h5 >Le N° __________________/SONAPIE/</h5> 
    <h3 style="text-align: center">ATTESTATION DE NON LOGEMENT DE TYPE << A >></h3>
    <h5 style="text-align: center">Le Directeur Général de la Société Nationale de Gestion du Patrimoine Immobilier de
        l’Etat, atteste que</h5>
            <div class="">
                <p style="font-weight: bold">Monsieur    {{$personelinfo->nom }}   {{$personelinfo->prenom}}</p>  
            </div>
            <div>
                <p ><span style="font-weight: bold">FONCTION                 :</span> {{$personelinfo->fonction}} </p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">NUMERO MATRICULE         :</span>{{$personelinfo->matricule}}</p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">REGION                   :</span> {{$personelinfo->region}}</p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">LOCALITE                 :</span> {{$personelinfo->localite}}</p>
            </div>
            <div class="">
                <p ><span style="font-weight: bold">ETABLISSEMENT / SERVICE  :</span> {{$personelinfo->service}}</p>           
            </div>
            <div class="">
                <p ><span style="font-weight: bold">MINISTERE                :</span> {{$personelinfo->minstere}}</p>
            </div>
            <div>
                <p ><span style="font-weight: bold">TAUX D’INDEMNITE         :</span> {{$conjoint->taux_indemnite}} </p>
            </div>
            <div>
                <p ><span style="font-weight: bold">SERVICES DEPUIS LE       :</span>{{ \Carbon\Carbon::parse($personelinfo->date_effet)->format('d/m/Y') }} </p>
            </div>
            <div>
                <p >En foi de quoi, la présente attestation lui est délivrée pour servir et valoir ce que de droit.</p>
            </div>
            <div>
                <pre style="font-weight: bold"><span> Abidjan , le {{ \Carbon\Carbon::parse($application->updated_at)->format('d/m/Y') }}</span>                          <span >Le Directeur Général</span></pre>
            </div>
            <div class="tempo">
                <img width="160px"  src="{{ public_path("assets/images/tempo.jpg")}}" alt="">
            </div>
            <div class="signature">
                <img width="150px" src="{{ public_path("assets/images/signature.png")}}" alt="">
                <p style="text-decoration: underline">DIABATE Kaladji</p>
            </div>

       
</div>
</body>
</html>
