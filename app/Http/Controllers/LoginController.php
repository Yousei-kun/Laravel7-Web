<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use App\User2;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

//    commit 3rd July 2021
//    public function auth()
//    {
//        $username = request()->post()['username'];
//        $password_input = request()->post()['password'];
//        $password_check = User2::where('username', $username)->first()['password'];
//
//        if (Hash::check($password_input, $password_check)) {
////            return redirect()->route('dashboard', [$username]);
//            return redirect()->action(
//                [DashboardController::class, 'index'], ['username' => $username]
//            );
//
////            return route('dashboard')->with('username', $username);
//        }
//        else {
//            return view('login')->with('auth', 'Incorrect Password');
//        }
//    }

    //Pilot Jinix - 4th July

    public function welcome(Request $request){
        $session = $request->session()->get('username');

        if ($session != null){
            return redirect(route('dashboard'));
        }

        return view("welcome");
    }

    public function authenticate(Request $request){
//      ini gunanya untuk validasi apakah ada variable yang kosong
        $request->validate([
            "username"=>"required",
            "password"=>"required|min:8"
        ]);

        $credentials = $request -> only('username', 'password');

//      disini bagian cek auth nya gan
        if (Auth::attempt($credentials)){
            $request->session()->put("username", $request->username);
            return redirect(route("dashboard"));
        }

        return redirect(route("login"));
    }
}
