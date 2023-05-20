@extends('layouts.dashboard.common-dash')

@section('title', 'page des demandes')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom du Demandeur</th>
                    <th scope="col">fiche d'inscription </th>
                    <th scope="col">fiche de paiement</th>
                    <th scope="col">fichiers joindues</th>
                    <th scope="col">status</th>
                    <th  scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paiments as $i => $item)                
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
                        <button type="submit" name="print_info" class="btn" style="background-color:black;  color:white;">en attente</button>
                    </td>
                    <th >
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-danger  me-1"  data-bs-toggle="modal" data-bs-target="#delete-user">
                                    <i class="fa-regular fa-trash-can "></i>
                                </button>
                                <button class="btn btn-warning edit-userbutton"   data-bs-target="#edit-user" data-bs-toggle="modal" >
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
            {!! $paiments->links() !!}
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
@endsection

