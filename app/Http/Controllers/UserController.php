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
    public function index()
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
         }
    
        $roles = Role::all();
        $users=User::all();
        return view('layouts.dashboard.user-dash',compact('users'));
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
        $user = User::find($request->id);
        if($user){
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'user deleted successfuly'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'user not found'
        ]);
    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255',
        ]);
        $user = User::find($request->id)->first();
        if($user){
               if($request->has('first_name')){
                   $user->first_name = $request->first_name;
               }
               if($request->has('last_name')){
                   $user->last_name = $request->last_name;
               }
               if($request->has('email')){
                   $useremail=User::where('email',$request->email)->first();
                   if($useremail){
                        if($useremail->email == $user->email){
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
                     'message' => 'user updated successfuly'
               ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'user not found'
        ]);
    }
}
