<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

//    public function index()
//    {
//        $data = request()->all();
//        return view('dashboard')->with('data', $data);
//    }

//  get Session dari login
    public function index(Request $request){
        $session = $request->session()->get("username");

        if ($session == null){
            return redirect(route('login'));
        }

        $data = DB::table('users')->where('username', $session)->first();

        return view("dashboard", compact("data"));
    }

    public function logout(Request $request){
        $request->session()->forget('name');
        $request->session()->flush();

        return redirect(route('login'));
    }
}
