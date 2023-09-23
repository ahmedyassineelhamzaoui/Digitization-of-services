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
                                <div class="breadcrumb">Accueil / <span style="color:rgb(8, 149, 53)">ANL de type L</span>  </div>
                        </div>

                        <div class="attestation-title mb-5">
                            <h1>Attestation de Non Logement type L</h1>
                            <hr>
                        </div>

                        <div class="list-fornir">
                            <h4 class="mb-4">Liste des pièces à fournir</h4>

                            <ul>
                                <li class="mb-3">
                                    Une (01) photocopie de la décision ou de nomination de la Fonction Publique;
                                </li>
                                <li class="mb-3">
                                    Une (01) original du certificat de prise de service de la corps qui vous donne droit a l'indemnite de
                                    logement ou un (01) photocopie l'égalisée;
                                </li>
                                <li class="mb-3">
                                    Une (01) demande manuscrite  de regularisation addresse au directeur general de la sonapié
                                    (indiquer la période non priseen compte de la demande);
                                </li>
                                <li class="mb-3">
                                    Trois (03) bulletins de la solde et leurs photocopies;

                                    - Le dernier bulletin ou l'indemnite de logement apparait;

                                    - Le premier bulletin de logement n'apparait plus

                                    - Un (01) bulletin récent au moment du dépot du dossier
                                </li>
                                <li class="mb-3">
                                    frais de dossier
                                </li>
                                <li class="mb-3">
                                    Une (01) photocopie de piece d'identité;
                                </li>
                                <li class="mb-3">
                                    Un (01) certificat de non heberegement ( original ) délivré par la direction de la construction;
                                    de votre localité pour ceux de l'interieur
                                </li>
                                <li class="mb-3">
                                    (NB) dépot des dossieres dans les agences de la post Coted'Ivoire de votre localité;
                                </li>
                                <li class="mb-5">
                                    Infoline: 27 20 25 64 00 poste: 149
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
