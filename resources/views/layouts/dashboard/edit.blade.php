@extends('layouts.dashboard.common-dash')
@section('content')
<div class="container w-75 rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                {{-- <img class="rounded-circle mt-5"
                src="{{ asset('../assets/images/' . (Auth::user()->profile_image ?: 'default.png')) }}"  width="90">

                <span class="font-weight-bold">{{ Auth::user()->full_name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span>United States</span> --}}

                <form action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="profile_image">
                        <img style="cursor: pointer"  class="rounded-circle mt-5" id="profile-preview"  
                            src="{{ asset('assets/images/' . (Auth::user()->profile_image ?: 'default.png')) }}" width="90">
                        <input  type="file" id="profile_image" name="profile_image" style="display: none;">
                    </label>
                    <p style="font-weight:bold">{{ Auth::user()->full_name }}</p>
                    <p class="text-black-50">{{ Auth::user()->email }}</p>
                    <button class="btn btn-primary mt-3" type="submit">Mettre à jour l'image</button>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back">
                    </div>
                    <h6 class="text-right">Editer le profil </h6>
                </div>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                     <div class="form-group mb-2">
                        <label for="full_name" style="font-size: 16px">Nom et prénom</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ Auth::user()->full_name }}" required>
                      </div>
                      <div class="form-group mb-2">
                        <label for="email" style="font-size: 16px">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                      </div>
                      <div class="form-group mb-2">
                        <label for="password" style="font-size: 16px">nouveau mot de passe </label>
                        <input type="password" class="form-control" id="password" name="password" minlength="8">
                      </div>
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Enregistrer le profil                        </button></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection