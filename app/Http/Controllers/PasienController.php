<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{

    public function index()
    {
        $data['title'] = "Pasien";
        $data['pasien'] = Pasien::get();

        return view('pasien.index', $data);
    }

    public function create()
    {
        $data['title'] = "Pasien";

        return view('pasien.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_nik'        => 'required',
            'nama_anggota'  => 'required',
            'nama_kk'       => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'no_telp'     => 'required',
            'no_bpjs'       => 'required',
            'no_rm_lama'    => 'required'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
