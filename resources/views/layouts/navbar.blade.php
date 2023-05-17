<nav class="navbar navbar-expand-lg bg-white px-5 border-bottom">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="assets/images/logo/logo1.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fa-solid fa-bars text-warning"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
            <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>
        </ul>

        @if (auth()->check())

            <div class="d-flex register" role="search">
                <a href="/dashboard" class="btn btn-outline-success me-3 sign-up">Mon espace</a>
            </div>

        @else

            <div class="d-flex register" role="search">
                <a href="/register" class="btn btn-outline-success me-3 sign-up">Sign Up</a>
                <a href="/login" class="btn btn-outline-success sign-in">Sign In</a>
            </div>
        @endif

        {{-- <div class="d-flex register" role="search">
            <a href="/register" class="btn btn-outline-success me-3 sign-up">Sign Up</a>
            <a href="/login" class="btn btn-outline-success sign-in">Sign In</a>
        </div> --}}
    </div>
    </div>
</nav>
