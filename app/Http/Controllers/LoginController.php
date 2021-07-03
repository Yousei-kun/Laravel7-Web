<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\User2;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $username = request()->post()['username'];
        $password_input = request()->post()['password'];
        $password_check = User2::where('username', $username)->first()['password'];

        if (Hash::check($password_input, $password_check)) {
//            return redirect()->route('dashboard', [$username]);
            return redirect()->action(
                [DashboardController::class, 'index'], ['username' => $username]
            );

//            return route('dashboard')->with('username', $username);
        }
        else {
            return view('login')->with('auth', 'Incorrect Password');
        }
    }
}
