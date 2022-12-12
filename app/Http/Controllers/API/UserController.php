<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [

            'level_id' => 'required|integer',
            'email' => 'required|string|max:50',
            'noKTP' => 'required|max:16',
            'unitAREA' => 'required|max:50',
            'nama_perusahaan' => 'required|max:50',
            'direktur' => 'required|max:50',
            'direktur_wakil' => 'required|max:50',
            'hp_direktur' => 'required|max:12',
            'hp_direktur_wakil' => 'required|max:12',
            'telepon_perusahaan' => 'required|max:12',
            'kota' => 'required|max:50',
            'alamat' => 'required|max:50',
            'siup_no' => 'required|max:50',
            'siup_tanggal' => 'required',
            'bidang_usaha' => 'required|max:50',



        ]);


        return User::create([
            'unitAREA' => $request->unitAREA,
            'nama_perusahaan' => $request->nama_perusahaan,
            'noKTP' => $request->noKTP,
            'direktur' => $request->direktur,
            'direktur_wakil' => $request->direktur_wakil,
            'hp_direktur' => $request->hp_direktur,
            'hp_direktur_wakil' => $request->hp_direktur_wakil,
            'telepon_perusahaan' => $request->telepon_perusahaan,
            'email' => $request->email,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'siup_no' => $request->siup_no,
            'siup_tanggal' => $request->siup_tanggal,
            'website' => $request -> website,
            'bidang_usaha' => $request->bidang_usaha,
            'level_id' => $request->level_id,

        ]);
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
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'level_id' => 'required|integer',
            'email' => 'required|string|max:50',
            'password' => 'required|max:50',
        ]);

        $dtPengguna = [
            'name' => $request->name,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        $ubahData = User::findOrFail($id);
        $ubahData->update($dtPengguna);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = User::findOrFail($id);
        $hapus->delete();
    }
}
