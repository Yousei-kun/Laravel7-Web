<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $data_akun = $request->session()->get("username");

        if ($data_akun == null){
            return redirect(route('login'));
        }

        $filename_full = $request->file('inputCV')->store('public/CV');
        $filename = explode("/",$filename_full)[2];

        $request->validate([
            "nim"=>"required|min:12|max:12",
            "name"=>"required",
        ]);

        DB::table("mahasiswas")->insert([
            'nim' => $request->nim,
            'name' => $request->name,
            'filename' => $filename,
        ]);

        return redirect(route("mahasiswa"));
    }

    public function edit(Request $request, $id)
    {
        $data_akun = $request->session()->get("username");

        if ($data_akun == null){
            return redirect(route('login'));
        }

        $request->validate([
            "nim"=>"required|min:12|max:12",
            "name"=>"required"
        ]);

        if (empty($request['inputCV'])) {
            DB::table("mahasiswas")->where('id', $id)->update([
                'nim' => $request->nim,
                'name' => $request->name,
            ]);
        }

        else {
            $filename_old = DB::table('mahasiswas')->where('id', $id)->first()->filename;
            Storage::delete("public/CV/$filename_old");

            $filename_full = $request->file('inputCV')->store('public/CV');
            $filename = explode("/",$filename_full)[2];

            DB::table("mahasiswas")->where('id', $id)->update([
                'nim' => $request->nim,
                'name' => $request->name,
                'filename' => $filename,
            ]);
        }

        return redirect(route("mahasiswa"));
    }


    public function destroy(Request $request, $id)
    {
        $data_akun = $request->session()->get("username");

        if ($data_akun == null){
            return redirect(route('login'));
        }

        $filename = DB::table('mahasiswas')->where('id', $id)->first()->filename;
        Storage::delete("public/CV/$filename");
        DB::table("mahasiswas")->where('id', $id)->delete();


        return redirect(route("mahasiswa"));
    }
}
