@extends('layouts.app')
@section('title')
   formulaire
@endsection
@section('content')
<div>
    <hr >
    <h1 style="text-align: center">Reçu de paiment </h1>
    <hr>
    <h3 style="text-align: end">Date: {{$paiment->created_at}}</h3>
    <div style="text-align: center">
        <div>
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">Numéro de Téléphone            : </span><span> {{$paiment->telephone}}</span></h5>
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">ID identifiant                 :</span><span>   {{$paiment->credential_id}}</span></h5>
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">Nom du client                  :</span><span>   {{$paiment->client_nom}}</span></h5>
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">Prenom du Client               : </span><span> {{$paiment->client_prenom}}</span></h5> 
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">Le numéro de l’avis de recette :</span><span>   {{$paiment->identifiant}}</span></h5>
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">Nature de la recette           : </span><span> {{$paiment->nature_recette}}</span></h5>                     
            <h5  class="d-flex justify-content-between"><span style="font-weight: bold">Montant Total du paiement      :</span> <span>  {{$paiment->montant_total}}</span></h5>
       
        </div>
    </div>

</div>
@endsection