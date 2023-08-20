@extends('layouts.app')

@section('title', 'Paiement Requis !')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="text-center">
            <h1 style="color:orange" class="display-1">402</h1>
            <h3 class="font-weight-bold">Paiement Requis !</h3>
            <p class="font-weight-bold mb-4">Veuillez noter que le paiement est requis pour continuer..</p>
            <div>
                <a style="background:orange;color:aliceblue" href="{{url('home')}}" class="btn  px-4 py-2 rounded-pill">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>
@endsection