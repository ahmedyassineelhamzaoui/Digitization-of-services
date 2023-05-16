<?php
namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use App\Models\User;


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
                // 'last_name' => 'required|string|max:255|min:2',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            $user = User::create([
                'full_name' => $request->full_name,
                // 'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
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


            $user = Auth::user();
            return redirect()->route('home')->with('success', 'Welcome To Anl');

            // return redirect()->route('home')->with([
            //     'success' => 'Welcome',
            //     'token' => $token
            // ]);



        }

        public function logout()
        {
            Auth::logout();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        }
    }
