<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nullix\CryptoJsAes\CryptoJsAes;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    public function __construct()
    {
    }
    
    protected function guard()
    {
        return Auth::guard('web');
    }
    
    public function loginForm() {
        if(!is_null(session('session_token'))) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $password = CryptoJsAes::decrypt($request->password, $request->_token);

        if(!Auth::attempt([
            'email' => $request->email,
            'password' => $password
        ])) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ])->onlyInput('email');
        }
        
        $user = Auth::user();
        if (!Hash::check($password, $user->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ])->onlyInput('email');
        }
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $password])) {
            $token = Str::random(32);
            $user->session_token = $token;
            $user->save();
            $request->session()->put('session_token', $user->session_token);
            $request->session()->regenerate();
        }


        return redirect()->intended('dashboard');

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->flush();

        session()->invalidate();
        session()->regenerate();
        session()->flush();

        return redirect(route('auth.login'));
    }
}
