<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginPage()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        // dd(123);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('employe')->with('success', 'You are logged in!');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->withInput($request->only('email'));
    }
    

    public function registerPage()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        // dd(123);
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:employes,email', // Ensure unique email in 'roles' table
            'password' => 'required|min:5',
        ]);
        // dd($data);
        $data['password'] = Hash::make($data['password']);
    
        $role = Employe::create($data);
    
        return view('login.index')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginPage');
    }

    
}
