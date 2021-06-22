<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index',compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $pesan = [
            'unique' => ':attribute sudah terdaftar',
            'required' => ':attribute wajib di isi',
        ];
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
        ],$pesan);

        $email = str_replace(' ', '', $request->nama);
        $user = User::create([
            'name' => $request->nama,
            'email' => $email.'@smk.com',
            'password' => bcrypt('rahasia'),
        ]);
        $user->assignRole('guru');

        $guru = Guru::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'user_id' => $user->id,
        ]);
        toastr()->success('Data berhasil di tambahkan', 'Berhasil');
        return redirect('data-guru')->with('berhasil');
    }

    public function edit($id)
    {
        $guru = Guru::find($id);
        $guru->first();
        return view('guru.edit',compact('guru'));
    }

    public function update(Request $request,$id)
    {
        $pesan = [
            'unique' => ':attribute sudah terdaftar',
            'required' => ':attribute wajib di isi',
        ];
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
        ],$pesan);
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());
        toastr()->success('Data berhasil di update', 'Berhasil');
        return redirect('data-guru')->with('berhasil');
    }

    public function hapus($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        toastr()->success('Data berhasil di hapus', 'Berhasil');
        return redirect('data-guru')->with('berhasil');
    }
}
