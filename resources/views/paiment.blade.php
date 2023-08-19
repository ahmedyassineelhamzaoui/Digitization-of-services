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
        }
        #image-container {
            position: absolute;
            top: 0;
            left: 0;
        }
        #picture-content{
            position: absolute;
            width: 400px;
            height: 400px;
            left: 45%;
            top: 30%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 400px auto;
            background-image: url({{ public_path("assets/images/sonapie_home.png") }});
        }
        h3{
            color:rgb(8, 149, 53) ;
            float: right;
        }
        #text-container {
            position: absolute;
            top: -2%;
            right: 0;
            text-align: center;
            width: 300px;
        }
        #paiment-content{
            position: absolute;
            top: 50%;
            left: 20%;
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body>

<div>
    <img id="image-container " width="350px"  src="{{ public_path("assets/images/logo/logo1.jpg")}}" alt="">
    <div id="text-container"  style="text-align: center"><p>REPUBLIQUE DE COTE D'IVOIRE</p><p>Union-Discipline-Travail</p><p>------------</p></div>
    <h2 style="text-align: center;background-color: rgb(243, 163, 58);height:40px;line-height: 40px;align-items:center;    align-items: center;
    ">Reçu de paiment </h2>
    <h3 >Date: {{$paiment->created_at}}</h3>
    <div id="paiment-content">
        <h4 >Numéro de Téléphone            :  {{$paiment->telephone}}</h4>
        <h4 >ID identifiant                 :  {{$paiment->credential_id}}</h4>
        <h4 >Nom du client                  :  {{$paiment->client_nom}}</h4>
        <h4 >Prenom du Client               :  {{$paiment->client_prenom}}</h4> 
        <h4 >Le numéro de l’avis de recette :  {{$paiment->identifiant}}</h4>
        <h4 >Nature de la recette           :  {{$paiment->nature_recette}}</h4>                     
        <h4 >Montant Total du paiement      :  {{$paiment->montant_total}}</h4>       
    </div>

    <div id="picture-content">
      
    </div>

</div>
</body>
</html>