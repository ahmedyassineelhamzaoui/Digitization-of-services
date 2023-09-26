<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class SocialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if($finduser) {
                Auth::login($finduser);
                // return redirect('/home');
                return redirect()->route('home')->with('success', 'Welcome '. $finduser->full_name);

            }else{
                $new_user = User::create([
                    'full_name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('my-google'),
                    'social_id' => $user->id,
                    'social_type' => 'google'
                ]);
                $new_user->assignRole('utilisateur');

                Auth::login($new_user);
                // return redirect('/home');
                return redirect()->route('home')->with('success', 'Welcome '. $new_user->full_name);


            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if($finduser) {
                Auth::login($finduser);
                // return redirect('/home');
                return redirect()->route('home')->with('success', 'Welcome '. $finduser->full_name);

            }else{
                $new_user = User::create([
                    'full_name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('my-facebook'),
                    'social_id' => $user->id,
                    'social_type' => 'facebook'
                ]);

                Auth::login($new_user);
                // return redirect('/home');
                return redirect()->route('home')->with('success', 'Welcome '. $new_user->full_name);


            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
