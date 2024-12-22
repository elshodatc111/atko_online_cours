<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller{
    public function login(){
        return view('user.login');
    }
    public function login_post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('user_home')->with('success', 'Tizimga muvaffaqiyatli kirdingiz!');
        }
        return back()->withErrors(['email' => 'Email yoki parol noto‘g‘ri!']);
    }
    public function registr(){
        return view('user.registr');
    }
    public function register_post(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'type' => 'user',
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user_login')->with('status', 'Ro\'yxatdan o\'tish muvaffaqiyatli amalga oshirildi!');
    }
    public function confirm_email(){
        return view('user.confirm_email');
    }

}
