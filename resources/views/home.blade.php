@extends('layouts.app')
@section('title', 'page Acceuil')

@section('content')

    @extends('layouts.navbar')


    <header class="">

        <div class="header-title">
            <p>
                Bienvenue sur le site de demande d'Attestation de Non Logement
            </p>
        </div>

    </header>

    <main class="mb-5">
        <section class="procedure text-center">
            <div class="procedure-btn">
                <a href="#" class="btn">Procédures et conditions</a>
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
                        <a href="anl-detail-R">
                            <img src="assets/images/ANL_R.png" alt="" class="img-fluid" width="200" height="200">
                        </a>
                        <h4>Attestation de type R</h4>
                        </div>
                        <div class="h-body text-center">
                        <p>Régularisez votre attestation de non logement.</p>
                        <p><a href="anl-detail-R" class="btn">En savoir plus</a></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                    <div class="card highlight h-100">
                        <div class="h-caption text-center">
                        <a href="anl-detail-L">
                            <img src="assets/images/ANL_L.jpg" alt="" class="img-fluid" width="200" height="200">
                        </a>
                        <h4>Attestation de type L</h4>
                        </div>
                        <div class="h-body text-center">
                        <p>Régularition de l'attestation de non logement sur une période déterminée.</p>
                        <p><a href="anl-detail-L" class="btn">En savoir plus</a></p>
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

    @include('layouts.footer')
@endsection



@section('script')


    <script>
        $(document).ready(function() {
    // Check if the session message exists
    if ("{{ session('success') }}") {
        // Create the alert element
        var alertElement = $('<div class="alert header-alert alert-success alert-dismissible fade show w-30" role="alert">' +
            '{{ session('success') }}' +
            // '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>');

        // Add custom styles to the alert element
        alertElement.css({
            'position': 'absolute',
            'top': '5px',
            'right': '0px',
            'z-index': '9999',
            'opacity': '0',
            'border-radius': '0',
            'background-color': '#f79400',
            'color': 'white',
            'border': 'none'
        });

        // Append the alert to the header
        $('.header-title').after(alertElement);

        // Apply fade-in animation
        setTimeout(function() {
            alertElement.css('opacity', '1');
        }, 100);

        // Automatically close the alert after 5 seconds
        setTimeout(function() {
            // Apply fade-out animation
            alertElement.css('opacity', '0');

            // Remove the alert from the DOM after the animation ends
            setTimeout(function() {
                alertElement.alert('close');
            }, 300);
        }, 10000);
    }
});

    </script>

@endsection



