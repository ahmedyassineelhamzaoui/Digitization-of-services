@extends('layouts.app')

@section('title', 'Page expirée !')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="text-center">
            <h1 style="color:orange" class="display-1">419</h1>
            <h3 class="font-weight-bold">Page expirée !</h3>
            <p class="font-weight-bold mb-4">Désolé, mais votre session a expiré. Veuillez rafraîchir la page et réessayer. Si le problème persiste, veuillez vous reconnecter.</p>
            <div>
                <a style="background:orange;color:aliceblue" href="{{url('home')}}" class="btn  px-4 py-2 rounded-pill"> Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>
@endsection
