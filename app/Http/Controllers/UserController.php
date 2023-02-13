<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\ModelUser;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->role == 1) {
                return redirect()->intended('/dashboard');
            } else {
                return view('admin.login');
            }
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $cek = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );


        if ($cek == false) {
            return redirect()->back()->withErrors($cek)->withInput();
        } else {
            $dataUser = ModelUser::where('username', $request->username)->first();

            if ($dataUser) {
                if (Hash::check($request->password, $dataUser->password)) {

                    $credensial = $request->only('username', 'password');

                    if (Auth::attempt($credensial)) {
                        $user = Auth::user();
                        $request->session()->regenerate();
                        if ($user->role == 1) {
                            return redirect()->intended('/dashboard');
                        } 
                    }
                } else {
                    Alert::error('Akun tidak ditemukan !');
                    return back();
                }
            } else {
                Alert::error('Akun tidak ditemukan !');
                return back();
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
