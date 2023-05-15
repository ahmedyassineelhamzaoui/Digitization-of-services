@extends('layouts.app')
@section('title')
   formulaire
@endsection
@section('content')
<div>
    <hr >
    <h1 class="paiment-title">Reçu de paiment </h1>
    <hr>
    <div class="content-paiment">
        <div>
            <h5>Numéro de Téléphone : </h5>
            <h6>{{$paiment->telephone}}</h6>
            <h5>Reférence du paiement : </h5>
            <h6>{{$paiment->paiment_reference}}</h6>
        </div>
    </div>
    <div class="footer-paimentpdf">
        <h6 class="text-center">Copyright © 2022, SOGEPIE</h6>
    </div>
</div>
@endsection