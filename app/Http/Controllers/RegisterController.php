<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User2;

class RegisterController extends Controller
{
    public $model;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.auth.register');
    }

//    commit 3rd July 2021
//    public function check()
//    {
//        $username = request()->post()['username'];
//        $password = request()->post()['password'];
//
//        $this->model = new User2();
//        $this->model->username = $username;
//        $this->model->password = Hash::make($password);
//        $this->model->save();
//
//        return redirect(route("login"));
//    }

    public function register(Request $request){
        $request->validate([
            "username"=>"required",
            "password"=>"required|min:8"
        ]);

        DB::table("users")->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route("login"));
    }

}
