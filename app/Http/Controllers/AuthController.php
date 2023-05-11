<?php
namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use App\Models\User;


    class AuthController extends Controller
    {
        public function register(Request $request)
        {
            $request->validate([
                'first_name' => 'required|string|max:255|min:3',
                'last_name' => 'required|string|max:255|min:2',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);  
            return response()->json([
            'status' => 'success',
            'message' => 'user created successfuly'
            ]);
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
                return response()->json([
                    'status' => 'error',
                    'message' => 'invalid email or password'
                ]);
            }
            $user = Auth::user();
            return response()->json([
                    'status' => 'success',
                    'message' => 'welcom'.$user->first_name
            ]);
        }
    }
