@extends('layouts.app')


@section('title', 'page login')

@section('content')
    <section class="vh-100">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

            <div class="px-5 ms-xl-4">
                <a href="home.html">
                    <img src="assets/images/logo/logo1.png" alt="">
                </a>
            </div>

            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <form style="width: 23rem;" action="{{ route('connection') }}" method="POST">
                    @csrf

                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example18">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" id="form2Example18" class="form-control form-control-lg @error('email') is-invalid @enderror"/>
                        @error('email')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example28">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" id="form2Example28" class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                        @error('password')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-warning btn-lg btn-block w-100 text-white" type="submit" style="padding: .5rem 2.5rem;">Login</button>
                    </div>

                    <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                    <p>Don't have an account? <a href="signup.html" class="link-warning">Register here</a></p>

                </form>

            </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block shadow">
            <img src="assets/images/login1.jpg"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
        </div>
    </section>
@endsection
