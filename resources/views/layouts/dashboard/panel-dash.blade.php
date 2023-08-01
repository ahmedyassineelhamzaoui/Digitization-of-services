@extends('layouts.dashboard.common-dash')

@section('title', 'Statistiques')

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
                            <p class="mb-1">Total des demandes</p>
                            <h3 class="text-white">{{$demandess->count()}}</h3>
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

    <div class="row mt-4 mb-4 ml-2">
        <div class="col-md-5 col-lg-5">
          <div class="card border-2">
            <div class="card-body">
              <h3 class="card-title font-bold">Le statut des demandes</h3>
              <div class="d-flex justify-content-center">
                <div class="w-75">
                  {{ $chartjs2->render() }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="chart-of-week" class="col-md-5 col-lg-7 d-block">
            <div class="card border-2">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title font-bold">Le Nombre des demandes dans cette semaine</h4>
                    <select onchange="timeChanged1()" id="select-time1" class="form-select" style="width:120px" aria-label="Default select example">
                        <option value="1" selected>Semaine</option>
                        <option value="2">Mois</option>
                        <option value="3">Année</option>
                    </select>
                </div>
                {!! $chartByDayOfWeek->render() !!}
            </div>
            </div>
        </div>
      </div>
    <div id="chart-of-month" class="row mt-4 mb-4 ml-2 d-none">
        <div class="col-md-12 col-lg-12">
            <div class="card border-2">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title font-bold">Le Nombre des demandes dans ce mois</h4>
                    <select onchange="timeChanged2()" id="select-time2" class="form-select" style="width:120px" aria-label="Default select example">
                        <option value="1">Semaine</option>
                        <option value="2" selected>Mois</option>
                        <option value="3">Année</option>
                    </select>
                </div>
                {!! $chartByDayOfMonth->render() !!}
            </div>
            </div>
        </div>
    </div>
    <div id="chart-of-year" class="row mt-4 mb-4 ml-2 d-none">
        <div class="col-md-12 col-lg-12">
            <div class="card border-2">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title font-bold">Le Nombre des demandes dans cette année</h4>
                    <select onchange="timeChanged3()" id="select-time3" class="form-select" style="width:120px" aria-label="Default select example">
                        <option value="1">Semaine</option>
                        <option value="2">Mois</option>
                        <option value="3" selected>Année</option>
                    </select>
                </div>
                {!! $chartByDayOfYear->render() !!}
            </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4 ml-2 d-none">
        <div class="col-md-12 col-lg-12">
            <div class="card border-2">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title font-bold">Le Nombre des demandes dans l'année</h4>
                </div>
                {!! $chartByDayOfWeek->render() !!}
            </div>
            </div>
        </div>
    </div>
@endsection