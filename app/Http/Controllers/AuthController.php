<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login'); 
    }
    
    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); 
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function registerView(){
        return view('pages.register');
    }

    public function registerStore(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
        ]);
        
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'customer', 
    ]);

    
    Auth::login($user);

    
    return redirect('/dashboard')->with('success', 'Pendaftaran berhasil!');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}