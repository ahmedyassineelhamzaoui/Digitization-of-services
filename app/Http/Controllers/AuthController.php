<?php
namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use App\Models\User;
    use App\Mail\SendMailLink;
    use Illuminate\Support\Facades\Mail;

    class AuthController extends Controller
    {

        public function index(){
            return view('login');
        }

        public function home(){
            return view('home');
        }

        public function register(Request $request)
        {
            $request->validate([
                'full_name' => 'required|string|max:255|min:3',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_image' => 'assets/images/default.png',
            ]);
            $user->assignRole('utilisateur');
            return redirect()->route('login')->with('success','user created succesfuly');
        }


        public function login(Request $request)
        {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required|min:8|string'
            ]);

            $credentials = $request->only('email', 'password');
            $token = Auth::attempt($credentials);

            if (!$token) {
                return redirect()->back()->with('error', 'Invalid email or password')->withInput();

            }

            Auth::user()->update(['status' => 'online']);
            $user = Auth::user();
            return redirect()->route('home')->with('success', 'Bienvenue '. $user->full_name);

        }

        public function logout()
        {
            Auth::user()->update(['status' => 'offline']);
            Auth::logout();
            return redirect()->route('home');
        }

        public function editProfile()
        {
            $user = Auth::user();
            $bottonName = '';
            return view('layouts.dashboard.edit', compact('user','bottonName'));
        }


        public function updateProfile(Request $request)
        {
            $request->validate([
                'full_name' => 'required|string|max:255|min:3',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore(Auth::id()),
                ],
                'password' => 'nullable|string|min:8',
            ]);

            $user = Auth::user();
            $user->full_name = $request->full_name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('profile.edit')->with('success', 'Mise à jour du profil réussie');
        }

        public function updateImage(Request $request)
        {
            $request->validate([
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = Auth::user();

            if ($request->hasFile('profile_image')) {
                // $image = $request->file('profile_image');
                // $imagePath = $image->store('profile_images', 'public');
                // $user->profile_image = $imagePath;
                // $user->save();

                $file= $request->file('profile_image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/images'), $filename);
                $user->profile_image = $filename;
                $user->save();

            }

            return redirect()->route('profile.edit')->with('success', 'Image de profil mise à jour avec succès');
        }
        public function forgetPassword()
        {
            return view('forgetPassword');
        }
        public function sendEmail(Request $request)
        {
            $request->validate([
                'email'    => 'required|email|min:10',
            ]);
            $user = User::where('email', $request->email)->first();
    
            if (!$user) {
                return redirect()->back()->with('error','L\'email que vous avez saisie n\'éxiste pas');
            }
            $token = Str::random(10);
            $user->remember_token = $token;
            $user->save();
            Mail::to($request->email)->send(new SendMailLink($token, $request->email, $user->name));
            return redirect()->back()->with('success','nous avons envoyé une vérification par e-mail à votre adresse e-mail');
       
        }
        public function showChangePassword($token)
        {
            return view('changePassword',  ['token' => $token]);
        }
        public function changePassword(Request $request)
        {
        
            $request->validate([
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8|same:password'
            ]);                          
            $updatePassword=User::where('remember_token',$request->token)->first();
            if(!$updatePassword){
                return back()->with('error', 'Invalid opperation !');
            }
            $updatePassword->update(['password' => Hash::make($request->password)]);
            
            return redirect()->route('connection')->with('success','your password has been changed succesfuly');
        }

    }
