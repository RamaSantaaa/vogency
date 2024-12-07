<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login ( ){
        return view("login");
    }

    public function registerForm () {
        return view('register');
    }

    public function register(Request $request){
        // Validasi form
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
    
        // Cek apakah pengguna dengan nama yang sama sudah ada
        $existingUser = User::where('name', $formFields['name'])->first();
    
        if ($existingUser) {
            return redirect('/register')->with('error', 'Nama pengguna sudah ada.');
        }
        
        // Cek apakah password dan konfirmasi password sama
        if ($formFields['password'] !== $formFields['password_confirmation']) {
            return redirect('/register')->with('error', 'Password dan konfirmasi password tidak sama.');
        }
        
        // Enkripsi password
        $formFields['password'] = bcrypt($formFields['password']);
        
        // Buat pengguna baru
        $user = User::create($formFields);
        
        // Buat keranjang untuk pengguna
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();
    
        // Login pengguna
    
        return redirect('/login')->with('message', 'Pengguna berhasil dibuat, keranjang berhasil dibuat, dan pengguna berhasil login.');
    }
    
    

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
    
        if (auth()->attempt($formFields)) {
            return redirect('/');
        }
    
        // Check if the username exists
        $user = User::where('name', $formFields['name'])->first();
        if (!$user) {
            return back()->with('error', 'Username not Found.');
        }
    
        // If the username exists but the password is incorrect
        return back()->with('error', 'Incorrect password.');
    }    

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
