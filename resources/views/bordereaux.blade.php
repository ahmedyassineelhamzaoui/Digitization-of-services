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
    ">DOSSIERS ANL TRANSMIS A LA SOLDE</h2>
            ht: 100px">
       
        <div class="">
            <table>
                <tr>
                  <th>N°</th>
                  <th>Nom de fonctionnaire</th>
                  <th>Fonction ou corps</th>
                  <th>Matricule</th> 
                  <th>Date de prise service</th>
                  <th>Taux d'indemnité</th>
                  <th>N° Attestation 7</th>
                  <th>N° Dossier</th>
                </tr>
              
                <tr>
                  <td>Contenu</td>
                  <td>Contenu</td> 
                  <td>Contenu</td>
                  <td>Contenu</td>
                  <td>Contenu</td>
                  <td>Contenu</td>
                  <td>Contenu</td> 
                  <td>Contenu</td>
                </tr>
                            
              </table>
         
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
