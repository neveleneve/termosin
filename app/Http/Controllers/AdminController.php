<?php

namespace App\Http\Controllers;

use App\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loggedout()
    {
        return redirect(route('login'));
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect(route('login'));
    }

    public function logging_in(Request $request)
    {
        $cekdata =  Administrator::where('username', $request->username)->get();

        if (count($cekdata) > 0) {
            $inputpass = trim($request->password);
            $pass = trim($cekdata[0]['password']);
            if (Hash::check($inputpass, $pass)) {
                Auth::guard('admin')->loginUsingId($cekdata[0]['id']);
                return redirect('/administrator');
            } else {
                return redirect(route('login'))->with('info', 'Username/password tidak ditemukan! Silahkan coba lagi!');
            }
        } else {
            return redirect(route('login'))->with('info', 'Username/password tidak ditemukan! Silahkan coba lagi!');
        }
    }

    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('administrator');
        }else {
            return view('login');
        }
    }

    public function index()
    {
        return view('administrator.dashboard');
    }
}
