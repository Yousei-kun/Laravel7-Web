<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $data_akun = DB::table('users')->where('username', $session)->first()->username;
        return view("admin.master.dashboard", compact("data_akun"));
    }

    public function logout(Request $request){
        $request->session()->forget('username');
        $request->session()->flush();
        Auth::logout();

        return redirect(route('login'));
    }

    public function indexCreateMahasiswa(){
        return view('admin.master.createMahasiswa');
    }
}
