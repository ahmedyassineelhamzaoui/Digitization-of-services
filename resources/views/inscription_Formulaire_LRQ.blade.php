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
            @if($personelinfo->matricule =="PHYSIQUE")
            <div class="">
                <pre><span style="font-weight: bold;">Matricule : </span> {{$personelinfo->matricule}}<span style="font-weight: bold">            Fonctionnaire :</span>  {{$personelinfo->Fonctionaire }}<span style="font-weight: bold">            Secteur d’activité : </span> {{$personelinfo->secteur}}</pre> 
            </div>
            @endif
            @if($personelinfo->matricule =="MORAL")
            <div class="">
                <pre><span style="font-weight: bold;">Raison Sociale : </span> {{$personelinfo->raison_sociale}}<span style="font-weight: bold">            Sigle :</span>  {{$personelinfo->Sigle }}<span style="font-weight: bold">            Secteur d’activité : </span> {{$personelinfo->secteur}}</pre> 
            </div>
            @endif
            <div>
                <pre><span style="font-weight: bold" >Ville : </span> {{$personelinfo->Ville}} <span style="font-weight: bold" >              Quartier : </span>{{$personelinfo->Quartier}}</pre>
            </div>
        <div class="">
            <pre><span style="font-weight: bold" >Email : </span>{{$personelinfo->email}} <span style="font-weight: bold" >      Telephone : </span>  {{$personelinfo->telephone}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Ministère : </span>{{$personelinfo->minstere}}</pre>
        </div>

        <div>
            <pre><span style="font-weight: bold" >Standing : </span> {{$personelinfo->Standing}} <span style="font-weight: bold" >Type de batimment : </span> {{$personelinfo->type_batiment}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Service  : </span>{{$personelinfo->service}} </pre>            
        </div>
        <div>
            <pre><span style="font-weight: bold" >ILot : </span>{{$personelinfo->ILot}}</pre>
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >LOT : </span>{{$personelinfo->LOT}} <span style="font-weight: bold" >          Date d'effet : </span>{{$personelinfo->date_effet}}</pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Usage : </span>{{$personelinfo->Usage}}  </pre>            
        </div>
        <div class="">
            <pre><span style="font-weight: bold" >Date d'occupation : </span>{{$personelinfo->date_occupation}} </pre>            
        </div>
</div>
</body>
</html>
