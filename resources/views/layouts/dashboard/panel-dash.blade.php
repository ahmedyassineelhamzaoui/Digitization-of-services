@extends('layouts.dashboard.common-dash')

@section('title', 'Notifications')

@section('content')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="mr-3">Success!</strong>{{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!  </strong>  {{session('error')}}
        <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6 mb-1">
            <div class="widget-stat card bg-warning">
                <div class="card-body  p-4">
                    <div class="media d-flex justify-content-between align-items-center">
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Utilisateurs</p>
                            <h3 class="text-white">{{$users->count()}}</h3>
                        </div>
                        <div>
                            <img src="assets/images/users.png" alt="users">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6 mb-1">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media d-flex justify-content-between align-items-center">
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Rôles</p>
                            <h3 class="text-white">{{$roles->count()}}</h3>
                        </div>
                        <div>
                            <img src="assets/images/permissions.png" style="width:45px;hieght:45px" alt="users">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6 mb-1">
            <div class="widget-stat card bg-info">
                <div class="card-body p-4">
                    <div class="media d-flex justify-content-between align-items-center">
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Totale des demandes</p>
                            <h3 class="text-white">{{$demandes->count()}}</h3>
                        </div>
                        <div>
                            <img src="assets/images/demandes.png" style="width:45px;hieght:45px" alt="users">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6 mb-1">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media d-flex justify-content-between align-items-center">
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Nombre d'attestations</p>
                            <h3 class="text-white">4</h3>
                        </div>
                        <div>
                            <img src="assets/images/atestations.png" style="width:45px;hieght:45px" alt="users">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection