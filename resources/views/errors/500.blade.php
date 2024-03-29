@extends('layouts.app')

@section('title', 'Erreur interne du serveur')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="text-center">
            <h1 style="color:orange" class="display-1">500</h1>
            <h3 class="font-weight-bold">Erreur interne du serveur</h3>
            <p class="font-weight-bold mb-4">Erreur interne du serveur : veuillez réessayer plus tard.</p>
            <div>
                <a style="background:orange;color:aliceblue" href="{{url('home')}}" class="btn  px-4 py-2 rounded-pill">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>
@endsection
