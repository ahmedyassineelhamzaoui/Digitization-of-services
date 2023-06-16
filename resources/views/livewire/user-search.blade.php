<div>
    <div class=" mb-3">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-5">
                <form wire:submit.prevent="render" class="d-flex">
                    <input type="text" wire:model="search" class="form-control me-2" placeholder="Search users...">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>


    <div class="table-responsive">
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
                @forelse ($users as $item)

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
                @empty
                    <tr>
                        <td colspan="6">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{-- {!! $users->links() !!} --}}
            {!! $users->links('livewire.pagination-links') !!}

        </div>
    </div>

</div>
