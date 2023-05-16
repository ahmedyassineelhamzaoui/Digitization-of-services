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
            <h5><span style="font-weight: bold">Numéro de Téléphone : </span> {{$paiment->telephone}}</h5>
            <h5><span style="font-weight: bold">Reférence du paiement :</span>   {{$paiment->paiment_reference}}</h5>
        </div>
    </div>
    <div style="margin-top: 650px">
        <h6 style="text-align: center">Copyright © 2022, SOGEPIE</h6>
    </div>
</div>
@endsection