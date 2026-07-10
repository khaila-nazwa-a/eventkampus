<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|confirmed']);

        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>'peserta']);

        return redirect('/login')->with('success','Registrasi berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function authenticate(Request $request)
{

        $credential=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }
        return back()->with('error','Email atau Password salah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
};