@extends('layouts.app')


@section('title', 'Réinitialiser')

@section('content')
    <section class="vh-100">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black d-flex justify-content-center align-items-center ">
                    <form style="width: 23rem;" action="{{ route('forget.password') }}" method="POST">
                        @csrf
                        <div class="px-5 ms-xl-4">
                            <a href="home.html">
                                <img style="width:200px;margin-top:5px" src="assets/images/logo/logo1.jpg" alt="">
                            </a>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show z-20" role="alert">
                                <strong >{{session('error')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show z-20" role="alert">
                                <strong >{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example18">Adresse e-mail</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="form2Example18" placeholder="name@example.com" class="form-control form-control-lg @error('email') is-invalid @enderror"/>
                            @error('email')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pt-1 mb-4 d-flex justify-content-end">
                            <div></div>
                            <a href="{{url('login')}}" class="btn btn-light me-1">Anuller</a>
                            <button class="btn btn-warning text-white" type="submit" >envoyer un e-mail</button>
                        </div>
                    </form>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block shadow">

                <img src="assets/images/login1.jpg"
                    alt="Login image" class="w-100 vh-100"
                    style="object-fit: cover; object-position: left; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
            </div>
        </div>
        </div>
    </section>
@endsection
