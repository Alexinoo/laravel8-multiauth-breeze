<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

    public function AdminRegister()
    {
        return view('Admin.admin_register');
    }

    public function store(Request $request)
    {
        Admin::insert([
            'name' => $request->username,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()

        ]);

        return redirect()->route('login_form')->with('error', 'Admin created successfully');
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login_form')->with('error', 'Admin logout successfully');
    }
}
