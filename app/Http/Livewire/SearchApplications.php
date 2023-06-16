<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conjoint;
use App\Models\Current;
use App\Models\File;
use App\Models\Personelinfo;
use App\Models\Previous;
use App\Models\Paiment;
use Dompdf\Dompdf;
use App\Notifications\documentAction;
use Illuminate\Support\Facades\Notification;

class SearchApplications extends Component
{
    public $search = '';

    public function render()
    {

        $user = auth()->user();

        if($user->hasPermissionTo('modifier-demandes')){
            // dd($user);
            $applicationNames  = Application::All();
            $names = [];
            foreach($applicationNames as $applicationName){
                $user = User::find($applicationName->user_id);
                $names[] = $user->full_name;
            }
            $userPersonelinfos = Personelinfo::all();
            $files             = File::all();
            $conjoints         = Conjoint::all();
            $previouss         = Previous::all();
            $applications      = Application::paginate(5);



            $applications = Application::query()
            ->leftJoin('users', 'applications.user_id', '=', 'users.id')
            ->where(function ($query) {
                $query->where('users.full_name', 'like', '%' . $this->search . '%')
                      ->orWhere('applications.status', 'like', '%' . $this->search . '%');
            })
            ->select('applications.*')
            ->paginate(10);

            return view('livewire.search-applications', [
                'applications' => $applications,
                'files' => $files,
                'userPersonelinfos' => $userPersonelinfos,
                'conjoints' => $conjoints,
                'names' => $names
            ]);
        }else{

            $applicationNames  =  $user->applications()->get();
            $names = [];
            foreach($applicationNames as $applicationName){
                $user = User::find($applicationName->user_id);
                $names[] = $user->full_name;
            }
            $userPersonelinfos = Personelinfo::all();
            $files             = File::all();
            $conjoints         = Conjoint::all();
            $previouss         = Previous::all();
            $applications      = $user->applications()->paginate(5);

            // dd($userPersonelinfos);

            $applications = $user->applications()
            ->where('status', 'like', '%' . $this->search . '%')
            ->paginate(10);

            return view('livewire.search-applications', [
                'applications' => $applications,
                'files' => $files,
                'userPersonelinfos' => $userPersonelinfos,
                'conjoints' => $conjoints,
                'names' => $names
            ]);


        }


    }

}
