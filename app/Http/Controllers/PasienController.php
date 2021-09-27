<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class PasienController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['title'] = "Pasien";

        $search = $request->search;
        $select = $request->select;

        $data['pasien'] = Pasien::when($search, function ($query) use ($search) {
            return $query->where('no_rm', $search)->orWhere('no_nik', $search)->orWhere('nama_anggota', $search);
        })
        ->latest('no_rm')
        ->paginate(10);;

        $data['search'] = $search;
        $data['select'] = $select;
        
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
            'no_nik'        => 'required|numeric',
            'nama_anggota'  => 'required',
            'nama_kk'       => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required|numeric',
            'no_bpjs'       => 'required|numeric'
        ]);

        $pasien = new Pasien;
        $pasien->no_rm_lama     = $request->no_rm_lama;
        $pasien->nama_kk        = $request->nama_kk;
        $pasien->nama_anggota   = $request->nama_anggota;
        $pasien->tgl_lahir      = $request->tgl_lahir;
        $pasien->alamat         = $request->alamat;
        $pasien->no_bpjs        = $request->no_bpjs;
        $pasien->no_telp        = $request->no_telp;
        $pasien->no_nik         = $request->no_nik;
        $pasien->save();

        return redirect('/pasien')->with('message', 'Success Add...');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        try {
            $no_rm = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect(404);
        }

        $data['title'] = "Pasien";
        $data['pasien'] = Pasien::where('no_rm', $no_rm)->first();

        return view('pasien.edit', $data);

    }

    public function update(Request $request, $id)
    {

        try {
            $no_rm = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect(404);
        }

        $request->validate([
            'no_nik'        => 'required|numeric',
            'nama_anggota'  => 'required',
            'nama_kk'       => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required|numeric',
            'no_bpjs'       => 'required|numeric'
        ]);

        $pasien = Pasien::find($no_rm);
        $pasien->no_rm_lama     = $request->no_rm_lama;
        $pasien->nama_kk        = $request->nama_kk;
        $pasien->nama_anggota   = $request->nama_anggota;
        $pasien->tgl_lahir      = $request->tgl_lahir;
        $pasien->alamat         = $request->alamat;
        $pasien->no_bpjs        = $request->no_bpjs;
        $pasien->no_telp        = $request->no_telp;
        $pasien->no_nik         = $request->no_nik;
        $pasien->save();

        return redirect('/pasien')->with('message', 'Success Update...');

    }

    public function destroy($id)
    {

        try {
            $no_rm = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect(404);
        }

        $pasien = Pasien::find($no_rm);
        $pasien->delete();

        return redirect('/pasien')->with('message', 'Success Delete...');

    }
}
