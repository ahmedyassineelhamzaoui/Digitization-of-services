@extends('layouts.app')

@section('title', 'page attestation info')

@section('content')
    @extends('layouts.navbar')

    <main class="my-3">
        <section class="fornir">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="breadcrumbs mb-4">
                                <div class="breadcrumb">Accueil / <span style="color:rgb(8, 149, 53)">ANL de type A</span>  </div>
                        </div>

                        <div class="attestation-title mb-5">
                            <h1>Attestation de Non Logement type A</h1>
                            <hr>
                        </div>

                        <div class="list-fornir">
                            <h4 class="mb-4">Liste des pièces à fournir</h4>

                            <ul>
                                <li class="mb-3">
                                    Une (01) photocopie de la décision ou de l’arrêté de nomination de la Fonction Publique;
                                </li>
                                <li class="mb-3">
                                    Une (01) photocopie de la décision d'affectation ou Une (1) copie de votre page fonctionnaire sur le site SIGFAE;
                                </li>
                                <li class="mb-3">
                                    Une (01) copie du certificat de première prise de service (dans le corps ou la fonction donnant droit à l'indemnité);
                                </li>
                                <li class="mb-3">
                                    Un (01) original du bulletin de salaire tiré à la solde;
                                </li>
                                <li class="mb-3">
                                    Une (01) certificat de non-hébergement (original) délivré par la Direction de la Construction de la localité, pour ceux de l’intérieur(Non pour les Fonctionnaires et Agents de l’État d’Abidjan);
                                </li>
                                <li class="mb-3">
                                    Une (01) attestation sur l’honneur imprimer en ligne, à remplir et légaliser à la mairie (originale);
                                </li>
                                <li class="mb-3">
                                    Une (01) Certificat de résidence ou Une (1) facture CIE et Une (1) facture SODECI;
                                </li>
                                <li class="mb-3">
                                    Une (01) fiche d'insciption à imprimer après l'inscription en ligne;
                                </li>
                                <li class="mb-3">
                                    Un (01) acte de mariage pour les mariés;
                                </li>
                                <li class="mb-5">
                                    Une (01) photocopies de la CNI.
                                </li>
                            </ul>

                            {{-- <div class="pt-1 mb-4 text-center">
                                <button class="btn btn-warning btn-lg btn-block w-50 text-white" type="button" style="padding: .5rem 2.5rem; border-radius: 0;">Je rempli le formulaire</button>
                            </div> --}}

                            @if (auth()->check())
                            <div class="pt-1 mb-4 text-center">
                                <a href="{{url('formulaire')}}" class="btn  btn-lg btn-block w-50 text-white" type="button" style="padding: .5rem 2.5rem; border-radius: 0;background-color:rgb(231,123,32)">rempli le formulaire</a>
                            </div>
                            @else
                            <div class="pt-1 mb-4">
                                <a href="{{url('register')}}"  class="btn  btn-lg btn-block w-100 text-white" type="button" style="padding: .5rem 2.5rem; border-radius: 0;background-color:rgb(231,123,32)">connectez-vous pour remplir le formulaire</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
