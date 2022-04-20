<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Login(Request $request)
    {

        $loginCreds = $request->all();

        if (Auth::guard('admin')->attempt([

            'email' => $loginCreds['email'],
            'password' => $loginCreds['password'],

        ])) {

            return redirect()->route('admin.dashboard');
        } else {

            return back()->with('error', 'Invalid Email / Password');
        }
    }
    public function Index()
    {

        return view('Admin.admin_login');
    }

    public function Dashboard()
    {

        return view('Admin.dashboard');
    }
}
