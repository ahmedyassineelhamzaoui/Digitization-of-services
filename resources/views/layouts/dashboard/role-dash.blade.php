@extends('layouts.dashboard.common-dash')

@section('title', 'rôles')

@section('content')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        <strong>Succés!  </strong> {{session('success')}}
        <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
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
    
    @can('lister-rôles')
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom du Rôle</th>
                    <th scope="col">Permissions</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($roles as $item)
                <tr>
                    <th class="align-middle" scope="row">{{$item->id}}</th>
                    <td class="align-middle">
                        @if($item->name == 'controleur 1')
                            MODERATEUR
                        @endif 
                        @if($item->name  == 'controleur 2')
                            SOUS DIRECTEUR
                        @endif
                        @if($item->name  == 'controleur 3')
                            DIRECTEUR
                        @endif
                        @if($item->name  != 'controleur 1' && $item->name != 'controleur 2' && $item->name != 'controleur 3')
                            {{$item->name }}
                        @endif
                    </td>
                    <td>
                        @foreach ($item->permissions as $permission)
                        <button class="btn btn-success mt-2">{{ $permission->name }}</button>
                        @endforeach
                    </td>
                    <th>
                        <div class="d-flex align-items-center">
                            @can('modifier-rôle')
                                <button class="btn btn-warning edit-rolebutton"  data-role-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#edit-role">
                                    <i class="fa-solid fa-pen-to-square" ></i>
                                </button>
                            @endcan
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {!! $roles->links() !!}
        </div>
    </div>
    @endcan


   
    @can('modifier-rôle')
    <div class="modal fade" id="edit-role">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form a}tion="{{route('update.role')}}" method="POST" id="update-role">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier Le Rôle</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="role_editId" name="role_editId">
                        <div id="role-edit-error" class="alert alert-danger alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                            <p class="d-flex align-items-center"><strong class="me-2">Erreur  </strong><span class="edit-role-error"></span></p>
                            <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div id="role-edit-alert" class="alert alert-primary alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                            <p class="d-flex align-items-center"><strong class="me-2">Succés</strong><span class="edit-role-success"></span></p>
                            <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nom du Rôle</label>
                            <input type="text"  name="name" class="form-control" id="name-edit"/>
                        </div>
                        <div class="mb-3" id="picalty">
                            <label for="permissions-edit" class="form-label">Permissions</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Anuller</a>
                        <button type="submit" name="update" class="btn btn-warning task-action-btn" >Modifier</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

@endsection
