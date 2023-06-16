<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class RoleSearch extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $permissions=Permission::all();

        $roles = Role::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(5)
            ->withQueryString();

        return view('livewire.role-search', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function search()
    {
        $this->resetPage();
    }
}
