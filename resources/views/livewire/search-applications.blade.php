<div>
    {{-- <form wire:submit.prevent="render">
        <div class="form-group">
            <input wire:model="search" type="text" name="search" class="form-control" placeholder="You Can Search by Name Or Status" />
            <button type="submit" class="btn btn-search">Submit</button>
        </div>
    </form> --}}

    <!-- section of Search for posts -->
    <div class=" mb-3">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-5">
                <form wire:submit.prevent="render" class="d-flex">
                    <input wire:model="search" type="text" name="search" class="form-control me-2" placeholder="You Can Search by Name Or Status" />
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

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
                    <td style="font-weight: bold">{{ $names[$i] }}</td>
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
    </div>

    <div class="d-flex justify-content-end">
        {!! $applications->links() !!}
    </div>
</div>

