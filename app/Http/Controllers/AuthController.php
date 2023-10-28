<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ws_user;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'ws_user_email' => 'required',
            'ws_user_password' => 'required'
        ]);




        // First Get on Email then hash the map and 
        $ws_user = ws_user::where('ws_user_email', $request->ws_user_email)->first();

        // where('ws_user_password',$request->ws_user_password)->first();
        if ($ws_user && Hash::check($request->ws_user_password, $ws_user->ws_user_password)) {

            Auth::login($ws_user);
            return redirect("country/list");
        }

        return redirect()->back()->withInput()->withErrors([
            'ws_user_email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect("login");
    }
}
