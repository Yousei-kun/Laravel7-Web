<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    public function index(Request $request)
    {
        $dataakun = $request->session()->get("username");

        if ($dataakun == null){
            return redirect(route('login'));
        }

        $data = DB::table('mahasiswas')->get();
        return view("admin.mahasiswa.index", compact("data", "dataakun"));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
