<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    public function index(Request $request)
    {
        $data_akun = $request->session()->get("username");

        if ($data_akun == null){
            return redirect(route('login'));
        }

        $data = DB::table('mahasiswas')->get();
        return view("admin.mahasiswa.index", compact("data", "data_akun"));
    }

    public function create(Request $request)
    {
        $request->validate([
            "nim"=>"required|min:12|max:12",
            "name"=>"required"
        ]);

        DB::table("mahasiswas")->insert([
            'nim' => $request->nim,
            'name' => $request->name,
        ]);

        return redirect(route("mahasiswa"));
    }

    public function edit(Request $request, $id)
    {
        DB::table("mahasiswas")->where('id', $id)->update([
            'nim' => $request->nim,
            'name' => $request->name,
        ]);

        return redirect(route("mahasiswa"));
    }


    public function destroy($id)
    {
        DB::table("mahasiswas")->where('id', $id)->delete();

        return redirect(route("mahasiswa"));
    }
}
