<?php

// namespace App\Http\Livewire;

// use Livewire\Component;
// use App\Models\User;

// class UserSearch extends Component
// {
//     public $search = '';

//     public function render()
//     {
//         $users = User::query()
//             ->where('full_name', 'like', '%'.$this->search.'%')
//             ->orWhere('status', 'like', '%'.$this->search.'%')
//             ->paginate(5);

//         return view('livewire.user-search', ['users' => $users]);
//     }
// }

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserSearch extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $users = User::query()
            ->where('full_name', 'like', '%'.$this->search.'%')
            ->orWhere('status', 'like', '%'.$this->search.'%')
            ->paginate(5)
            ->withQueryString(); // Include the query string parameters in pagination links

        return view('livewire.user-search', ['users' => $users]);
    }

    public function search()
    {
        $this->resetPage(); // Reset the pagination page to 1
    }
}
