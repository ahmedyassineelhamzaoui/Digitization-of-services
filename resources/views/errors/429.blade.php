@extends('layouts.app')
@section('title', 'Trop de demandes!')
@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="text-center">
            <h1 style="color:orange" class="display-1">429</h1>
            <h3 class="font-weight-bold">Trop de demandes!</h3>
            <p class="font-weight-bold mb-4">Désolé, mais nous recevons actuellement un grand nombre de demandes. Veuillez patienter une minute et réessayer..</p>
            <div>
                <a style="background:orange;color:aliceblue" href="{{url('home')}}" class="btn  px-4 py-2 rounded-pill"> Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>
@endsection
