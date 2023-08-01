<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function display()
    {
        return view('layouts.dashboard.common-dash');
    }
    public function index()
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
        }
        if(!$user->hasPermissionTo('lister-utilisateurs')){
            return view('errors.403');
        }

        $roles = Role::all();
        $users=User::paginate(5);
        $roles=Role::all();
        $bottonName = 'utilisateur';

        return view('layouts.dashboard.user-dash',compact('users','roles','bottonName'));
    }
    public function editUser($id)
    {
        $roles =Role::all();
        $user = User::find($id);
        if($user){
            if(!auth()->user()->hasPermissionTo('modifier-utilisateur')){
                return view('errors.403');
            }
            return response()->json([
                'user' => $user,
                'roles' => $roles,
                'role_name' => $user->roles[0]->name
            ]);
        }
        return response()->json([
            'message' => 'utilisateur n\'éxiste pas'
        ],404);
        
    }
    public function updateProfile(Request $request)
    {
         $authUser = auth()->user();
         if($authUser){
            $request->validate([
                'first_name' => 'required|string|max:255|min:3',
                'last_name' => 'required|string|max:255|min:2',
                'email' => 'required|string|email|max:255',
            ]);
            $user =User::find($authUser->id);
            if($request->has('first_name')){
               $user->first_name = $request->first_name;
            }
            if($request->has('last_name')){
               $user->last_name = $request->last_name;
            }
            if($request->has('email')){
                $useremail=User::where('email',$request->email)->first();
                if($useremail){
                    if($useremail->email == $authUser->email){
                        $user->email = $request->email;
                    }else{
                        return response()->json([
                            'status'  => 'error',
                            'message' => 'email has already been token',
                        ]);
                    }
                }else{
                    $user->email = $request->email;
                }
            }
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'info updated successfuly'
            ]);
         }
         return response()->json([
              'status' => 'error',
              'message' => 'user not found'
         ]);
    }
    public function deleteProfile(Request $request)
    {
        $userAuth = auth()->user();
        if($userAuth){
             $userAuth->delete();
             return response()->json([
                'status' => 'success',
                'message' => 'Profile has been delete successfuly'
             ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'user not found'
        ]);
    }
    public function deleteUser(Request $request)
    {
        $user = User::find($request->user_deletedId);
        if($user){
            $user->delete();
            return redirect()->back()->with('success','l\'utilisateur a été bien supprimer');
        }
        return redirect()->back()->with('error','l\'utilisateur n\'éxiste pas');
    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8', // Change to 'nullable'
        ]);

        $user = User::find($request->user_editId);
        if (!$user) {
            return response()->json([
                'message' => 'l\'utilisateur n\'existe pas'
            ]);
        }

        if ($request->has('full_name')) {
            $user->full_name = $request->full_name;
        }

        if ($request->has('role_name')) {
            $user->syncRoles([$request->input('role_name')]);
        }

        if ($request->has('email')) {
            $useremail = User::where('email', $request->email)->first();
            if ($useremail && $useremail->email !== $user->email) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'cet e-mail a déjà été pris',
                ]);
            }
            $user->email = $request->email;
        }

        if ($request->password != $user->password ) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return response()->json([
            'message' => 'l\'utilisateur a été bien modifié'
        ]);
    }

    public function createUser(Request $request)
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
        }
        if(!$user->hasPermissionTo('créer-utilisateur')){
            return view('errors.403');
        }
        $request->validate([
            'full_name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user=User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role_name);
        return response()->json([
            'message' => 'l\'utilisateur a été bien créer'
        ]);
    }
}
