@extends('layouts.dashboard.common-dash')

@section('title', 'page des demandes')

@section('content')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
        <strong>Succés!</strong> {{session('success')}}
        <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!</strong>  {{session('error')}}
        <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
        </button>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">fiche d'inscription </th>
                    <th scope="col">fiche de paiement</th>
                    <th scope="col">fichiers joindues</th>
                    <th scope="col">status</th>
                    @can('voir-demande-action')
                    <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $i => $item)                
                <tr>
                    <td style="font-weight: bold">{{ $userPersonelinfos[$i]->nom }}</td>
                    <td>
                       <form id="" action="{{route('send.Information')}}" method="post" class="mb-3">
                        @csrf
                        <input type="hidden" name="personel_id" value="{{$userPersonelinfos[$i]->id}}" id="personel-idinscription">
                        <button type="submit" name="print_info" class="btn btn-primary"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger</button>
                       </form>
                    </td>
                    <td>
                        <form id="" action="{{route('send.Information')}}" method="post" class="mb-3">
                            @csrf
                            <input type="hidden" name="personel_id" value="{{$userPersonelinfos[$i]->id}}" id="personel-idinscription">
                            <button type="submit" name="print_payment" class="btn btn-success"><span class="me-2"><i class="fa-solid fa-file-invoice"></i></span> Télécharger</button>
                        </form>
                    </td>
                    <td class="ps-3">
                        <button data-files-id={{$files[$i]->id}} data-bs-target="#show-joinedFile" data-bs-toggle="modal" name="print_info" class="btn show-allfiles" style="background-color:rgb(149, 0, 255);  color:white;"><span class="me-2"><i class="fa-solid fa-eye"></i></span> ouvrir</button>
                    </td>
                    <td>
                        @if($item->status =='accept')
                           <button   class="btn" style="background-color:rgb(7, 165, 7);  color:white;">accepter</button>
                        @elseif($item->status =='decline')
                           <button  class="btn" style="background-color:rgb(216, 38, 38);  color:white;"> refuser</button>
                        @elseif($item->status =='in progress')
                        <button  class="btn d-flex align-items-center" style="background-color:rgb(225, 131, 0);  color:white;">
                          <div class="me-1"> en cours </div>  
                          <div class="spinner-border" style="width:15px;height:15px" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                        </button>
                        @else
                        <button  class="btn" style="background-color:black;  color:white;">en attente</button>
                        @endif
                    </td>
                    @can('voir-demande-action')
                    <th>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                @can('supprimer-demandes')
                                <button class="btn btn-danger  me-1" onclick="deleteApplication({{$item->id}})"  data-bs-toggle="modal" data-bs-target="#delete-application"">
                                    <i class="fa-regular fa-trash-can "></i>
                                </button>
                                @endcan
                                @can('modifier-demandes')
                                  @if(auth()->user()->roles[0]->name =='controleur 1' && $item->editable1 == 'yes')
                                    <button class="btn btn-warning show-editstatusform" data-status-id={{$item->id}}   data-bs-target="#edit-status" data-bs-toggle="modal" >
                                        <i class="fa-solid fa-pen-to-square "></i>
                                    </button>
                                  @elseif(auth()->user()->roles[0]->name =='controleur 2' && $item->editable2 == 'yes')
                                    <button class="btn btn-warning show-editstatusform" data-status-id={{$item->id}}   data-bs-target="#edit-status" data-bs-toggle="modal" >
                                        <i class="fa-solid fa-pen-to-square "></i>
                                    </button>
                                  @elseif(auth()->user()->roles[0]->name =='controleur 3' && $item->editable3 == 'yes')
                                    <button class="btn btn-warning show-editstatusform" data-status-id={{$item->id}}   data-bs-target="#edit-status" data-bs-toggle="modal" >
                                        <i class="fa-solid fa-pen-to-square "></i>
                                    </button>
                                  @endif
                                @endcan
                            </div>
                        </div>
                    </th>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {!! $applications->links() !!}
        </div>
    </div>

    <div class="modal fade" id="show-joinedFile">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('create.role')}}" method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tous les fichiers</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                            <div id="role-create-alert" class="alert alert-primary alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                                <p class="d-flex align-items-center"><strong class="me-2">Succés</strong><span class="create-role-success"></span></p>
                                <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="mb-3">
                                <div id="file_liste"  class="bg-light border border-secondary text-secondary text-sm rounded-lg focus-ring border-0 form-control overflow-auto" style="max-height: 400px;" rows="10" required> 
                                   
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-status" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('update.status')}}" method="POST" >
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier Le Status</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="status_id" name="status_id">
                        <div id="status-edit-error" class="alert alert-danger alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                            <p class="d-flex align-items-center"><strong class="me-2">Erreur  </strong><span class="status-role-error"></span></p>
                            <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div id="status-edit-alert" class="alert alert-primary alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                            <p class="d-flex align-items-center"><strong class="me-2">Succés</strong><span class="status-role-success"></span></p>
                            <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status_name" id="status_name">
                                <option value="accept">accepter</option>
                                <option value="decline">refuser</option>
                            </select>
                        </div>
                        <div class="mb-3 " id="comment"></div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Anuller</a>
                        <button type="submit" name="update" class="btn btn-warning task-action-btn" >Modifier</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmedit-application" style="background:rgba(19, 18, 18, 0.5)" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" >
                <form   id="remove-application">
                    <div class="d-flex align-items-center justify-content-between my-2 mx-3">
                        <h5 class="modal-title">Confirmation</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                            <div class="my-3">
                                <h5 class="form-label">en cliquant sur confirmez vous n'avais pas le droit de modifier cette application apprés !!!</h5>
                            </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end my-2 mx-3 py-3">
                        <a href="#" class="btn btn-white me-2" data-bs-dismiss="modal">Anuller</a>
                        <button type="submit" name="save" class="btn btn-danger  task-action-btn" >Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-application">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('delete.application')}}" method="POST" id="remove-application">
                    @method('delete')
                    @csrf
                    <div class="d-flex align-items-center justify-content-between my-2 mx-3">
                        <h5 class="modal-title">Confirmation</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                            <input type="hidden" name="app_deletedId" id="app_deletedId">
                            <div class="my-3">
                                <h5 class="form-label">voulez vous variment supprimer cette demande ?</h5>
                            </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end my-2 mx-3">
                        <a href="#" class="btn btn-white me-2" data-bs-dismiss="modal">Anuller</a>
                        <button type="submit" name="save" class="btn btn-danger  task-action-btn" >Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

