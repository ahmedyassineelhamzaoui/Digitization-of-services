<div>
    <div class="mb-3">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-5">
                <form wire:submit.prevent="search" class="d-flex">
                    <input type="text" wire:model="search" class="form-control me-2" placeholder="Search roles...">
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
                    <th scope="col">Nom du Rôle</th>
                    <th scope="col">Permissions</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $item)
                    <tr>
                        <th class="align-middle" scope="row">{{ $item->id }}</th>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td>
                            @foreach ($item->permissions as $permission)
                                <button class="btn btn-success mt-2">{{ $permission->name }}</button>
                            @endforeach
                        </td>
                        <th>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-danger me-1" onclick="deleteRole({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#delete-role">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                                <button class="btn btn-warning edit-rolebutton" data-role-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#edit-role">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </div>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No roles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {!! $roles->links('livewire.pagination-links') !!}
        </div>
    </div>
</div>
