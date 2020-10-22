<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{

    public function __construct()
    {

        //$this->middleware('auth');
        if (Auth::check()) {
            return Redirect::to('/admin-home');
        }
    }


    public function index()
    {
        return view('home');
    }

    public function doLogin(Request $request)
    {
        $phone = $request['user_phone'];
        $password = $request['password'];
        $remember = true;
        // attempt to do the login
        if (Auth::attempt(['user_phone' => $phone, 'password' => $password], $remember)) {

            $user = User::where('user_phone', $phone)->first();
            $request->session()->put('outlet_id', $user->outlet_id);
            $request->session()->put('user_id', $user->user_id);
            $request->session()->put('user_image', $user->user_image);

            $outlet = Outlet::where('outlet_id', $user->outlet_id)->first();
            $request->session()->put('outlet_name', $outlet->outlet_name);
            $request->session()->put('outlet_image', $outlet->outlet_image);
            $request->session()->put('outlet_phone', $outlet->outlet_phone);
            $request->session()->put('outlet_address', $outlet->outlet_address);

            return Redirect::to('/admin-home');
        } else {
            return back()->with('failed', "Email or password does not match");

        }
        //Auth::logout(); // log the user out of our application
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/');
    }
}
