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
    </style>
</head>
<body>

<div style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" >
    <img id="image-container " width="400px"  src="{{ public_path("assets/images/logo/logo1.jpg")}}" alt="">
    <div id="text-container"  style="text-align: center"><p>REPUBLIQUE DE COTE D'IVOIRE</p><p>Union-Discipline-Travail</p><p>------------</p></div>
    <h2 style="text-align: center;background-color: rgb(243, 163, 58);height:40px;line-height: 40px;align-items:center;    align-items: center;
    ">Formulaire d'inscription</h2>
    <h3 style="text-decoration: underline">Les informations personnelles :</h3> 
            <div class="">
                <pre><span style="font-weight: bold;">Matricule : </span> {{$personelinfo->matricule}}<span style="font-weight: bold">            Nom :</span>  {{$personelinfo->nom }}<span style="font-weight: bold">            Prénom : </span> {{$personelinfo->prenom}}</pre> 
            </div>

            <div class="">
                <pre><span style="font-weight: bold" >Sexe : </span> {{$personelinfo->sexe}} <span></pre>
            </div>

            <div>
                <pre><span style="font-weight: bold" >Région : </span> {{$personelinfo->region}} <span style="font-weight: bold" >              Localité : </span>{{$personelinfo->localite}}</pre>
            </div>
        <div class="">
            <pre><span style="font-weight: bold" >Corps Antérieur : </span>{{$personelinfo->corps_anterieur}} <span style="font-weight: bold" >Corps : </span>  {{$personelinfo->Corps}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Ministère : </span>{{$personelinfo->minstere}}</pre>
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
            <pre><span style="font-weight: bold" >Date decret : </span>{{$personelinfo->date_decret}} <span style="font-weight: bold" >          Date d'effet : </span>{{$personelinfo->date_effet}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Date de fin : </span>{{$personelinfo->date_fin}}  </pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Date de Retrait : </span>{{$personelinfo->date_retrait}} </pre>            
        </div>
</div>
</body>
</html>
