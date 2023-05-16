@extends('layouts.app')


@section('title', 'page Acceuil')

@section('content')

    @extends('layouts.navbar')

    <header>
        <div class="header-title">
            <p>
                Bienvenue sur le site de demande d'Attestation de Non Logement
            </p>
        </div>
    </header>

    <main class="mb-5">
        <section class="procedure text-center">
            <div class="procedure-btn">
                <a href="#" class="btn">Procedure et conditions</a>
            </div>
            <div class="procedure-text">
                <p>
                    Veuillez Choisir le type d'attestation qui vous correspond
                </p>
            </div>

            <div class="procedure-cards">
                <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                    <div class="card highlight h-100">
                        <div class="h-caption text-center">
                        <a href="anl-detail">
                            <img src="assets/images/ANL_A.png" alt="" class="img-fluid" width="200" height="200">
                        </a>
                        <h4>Attestation de type A</h4>
                        </div>
                        <div class="h-body text-center">
                        <p>Votre toute 1ère attestation de non logement.</p>
                        <p><a href="anl-detail" class="btn">En savoir plus</a></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                    <div class="card highlight h-100">
                        <div class="h-caption text-center">
                        <a href="anl-detail">
                            <img src="assets/images/ANL_D.png" alt="" class="img-fluid" width="200" height="200">
                        </a>
                        <h4>Attestation de type D</h4>
                        </div>
                        <div class="h-body text-center">
                        <p>Régularisez votre attestation de non logement.</p>
                        <p><a href="anl-detail" class="btn">En savoir plus</a></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                    <div class="card highlight h-100">
                        <div class="h-caption text-center">
                        <a href="anl-detail">
                            <img src="assets/images/ANL_C.png" alt="" class="img-fluid" width="200" height="200">
                        </a>
                        <h4>Attestation de type C</h4>
                        </div>
                        <div class="h-body text-center">
                        <p>Régularition de l'attestation de non logement sur une période déterminée.</p>
                        <p><a href="anl-detail" class="btn">En savoir plus</a></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                        <div class="card highlight h-100">
                        <div class="h-caption text-center">
                            <a href="anl-detail">
                            <img src="assets/images/ANL_L.jpg" alt="" class="img-fluid" width="200" height="200">
                            </a>
                            <h4>Attestation de type L</h4>
                        </div>
                        <div class="h-body text-center">
                            <p>Régularition de l'attestation de non logement sur une période déterminée.</p>
                            <p><a href="anl-detail" class="btn">En savoir plus</a></p>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </section>
    </main>


@endsection

@section('footer')
        <footer>
            <div class="copyright">
                <p>Copyright © 2023, SOGEPIE Developed by
                    <span class="text-danger">&hearts; </span
                        >MTS GROUP AFRICA
                    <span class="text-danger"> &hearts; </span></p>
            </div>
        </footer>
@endsection



