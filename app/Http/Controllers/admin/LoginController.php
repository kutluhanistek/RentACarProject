<?php

namespace App\Http\Controllers\admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){

        return view('login.adminlogin');
    }

    public function login(Request $request){
        $request->validate([
            'kullanici_adi' => 'required',
            'password' => 'required|min:6'
        ]);
        $credentials = $request->only('kullanici_adi', 'password');
        $credentials['isAdmin'] = 1; // isAdmin sütunu kontrolü için
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::check()) {

                return redirect()->route('admin_dashboard');
            }
            return back()->withErrors([
                'message' => 'Geçersiz giriş bilgileri.',
            ]);


        }
}

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
