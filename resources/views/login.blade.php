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

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show z-20" role="alert">
                        <strong>{{session('error')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <form style="width: 23rem;" action="{{ route('connection') }}" method="POST">
                    @csrf

                    <div class="row mt-2">
                        <div class="col-8">
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign In</h3>
                        </div>
                        <div class="col-2">
                            <a
                                class="btn btn-primary btn-lg btn-floating border-0 rounded-circle mb-1"
                                style="background-color: #3b5998;"
                                href="/auth/facebook"
                                role="button"
                                >
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            <a
                                class="btn btn-primary btn-lg btn-floating border-0 rounded-circle mb-1"
                                style="background-color: #dd4b39;"
                                href="/auth/google"
                                role="button"
                                ><i class="fab fa-google"></i
                                >
                            </a>
                        </div>
                    </div>


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

                    <p class="small mb-3 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                    <p>Don't have an account? <a href="{{url('register')}}" class="link-warning">Register here</a></p>

                </form>

            </div>

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
