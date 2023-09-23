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
                                A
                            Monsieur le Directeur de la Solde
                            Ministère du Budget et du Portefeuille de l'Etat
                            ABIDJAN

    <h4 >N° __________________/SONAPIE/</h4> 
    <h5 >Dossier N° : 20211954 du 07/04/2021 C.A. N°: 1954  </h5> 
    <h3 style="text-align: center">OBJET : Régularisation d’Indemnité de Logement </h3>
            <div class="">
                <p style="font-weight: bold">Monsieur    {{$personelinfo->nom }}   {{$personelinfo->prenom}}</p>  
            </div>
            <div>
                <p ><span style="font-weight: bold">MATRICULE         :</span>{{$personelinfo->matricule}}</p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">FONCTION                 :</span> {{$personelinfo->fonction}} </p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">Percevait à ce titre, une Indemnité Contributive de Logement
                    De 40 000 FRANCS CFA
                    </span></p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">Au Ministère                   :</span> </p> 
            </div>
            <div>
                <p ><span style="font-weight: bold">Par arrêté ou décision N° 0072131460/MFP/DGFP/DGAPCE
                    du 16/03/2021                 :</span> </p>
            </div>
            <div class="">
                <p ><span style="font-weight: bold">Nouveau Corps qui lui donne droit à une Indemnité Contributive de Logement
                    De 50 000 FRANCS CFA</span> </p>           
            </div>
            <div>
                <p ><span style="font-weight: bold">J ' ai l’honneur de vous demander de régulariser sa situation à
                    Compter du</span> 02/01/2018 </p>
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
