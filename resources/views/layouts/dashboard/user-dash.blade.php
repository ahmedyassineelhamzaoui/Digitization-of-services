@extends('layouts.dashboard.common-dash')

@section('title', 'utilisateur')
@section('button-name','utilisateur')
@section('button-link','#add-user')
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

    {{-- <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom complet</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->roles[0]->name}}</td>
                    <td class="">
                        @if ($item->status == 'online')
                          <div class="d-flex align-items-center">
                            <div class="online-indicator">
                                <span class="blink"></span>
                            </div>
                            <span >en ligne</span>
                          </div>
                        @else
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle border-danger" style="width: 1.2em; height: 1.2em;background-color:red;border:3px solid"></div>
                            <span class="ms-2">hors ligne</span>
                        </div>
                        @endif
                    </td>
                    <th>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-danger  me-1" onclick="deleteUser({{$item->id}})" data-bs-toggle="modal" data-bs-target="#delete-user">
                                    <i class="fa-regular fa-trash-can "></i>
                                </button>
                                <button class="btn btn-warning edit-userbutton" data-user-id="{{$item->id}}"  data-bs-target="#edit-user" data-bs-toggle="modal" >
                                    <i class="fa-solid fa-pen-to-square "></i>
                                </button>
                            </div>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {!! $users->links() !!}
        </div>
    </div> --}}
    
    @livewire('user-search')

    <div class="modal fade" id="add-user">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('create.user')}}" method="POST" id="create-user">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un utilisateur</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                            <div id="user-create-alert" class="alert alert-primary alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                                <p class="d-flex align-items-center"><strong class="me-2">Succés</strong><span class="cretae-user-success"></span></p>
                                <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nom complet</label>
                                <input type="text" name="full_name" class="form-control" id="full_name"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rôle</label>
                                <select class="form-select" name="role_name" id="role_name">
                                    @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password"/>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Anuller</a>
                        <button type="submit" name="save" class="btn btn-primary task-action-btn" >Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-user">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form a}tion="{{route('update.user')}}" method="POST" id="update-user">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="user-updateId" name="user_editId">

                            <div id="user-edit-alert" class="alert alert-primary alert-dismissible fade hide align-middle" role="alert" style="height: 50px;">
                                <p class="d-flex align-items-center"><strong class="me-2">Succés</strong><span class="edit-user-success"></span></p>
                                <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nom complet</label>
                                <input type="text" name="full_name" class="form-control" id="full_nameedit"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rôle</label>
                                <select class="form-select" name="role_name" id="role_nameedit">
                                    @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="emailedit" placeholder="example@gmail.com"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="passwordedit"/>
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
    <div class="modal fade" id="delete-user">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('delete.user')}}" method="POST" id="remove-user">
                    @method('delete')
                    @csrf
                    <div class="d-flex align-items-center justify-content-between my-2 mx-3">
                        <h5 class="modal-title">Confirmation</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                            <input type="hidden" name="user_deletedId" id="user_deletedId">
                            <div class="my-3">
                                <h5 class="form-label">voulez vous variment supprimer l'utilisateur ?</h5>
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
