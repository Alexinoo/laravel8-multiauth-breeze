<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    public function Login(Request $request)
    {

        $loginCreds = $request->all();

        if (Auth::guard('seller')->attempt([

            'email' => $loginCreds['email'],
            'password' => $loginCreds['password'],

        ])) {

            return redirect()->route('seller.dashboard');
        } else {

            return back()->with('error', 'Invalid Email / Password');
        }
    }

    public function index()
    {
        return view('Seller.seller_login');
    }

    public function dashboard()
    {

        return view('Seller.dashboard');
    }

    public function register()
    {
        return view('Seller.seller_register');
    }

    public function store(Request $request)
    {
        Seller::insert([
            'name' => $request->username,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()

        ]);

        return redirect()->route('seller_login_form')->with('error', 'Seller created successfully');
    }

    public function logout()
    {
        Auth::guard('seller')->logout();

        return redirect()->route('seller_login_form')->with('error', 'Seller logout successfully');
    }
}
