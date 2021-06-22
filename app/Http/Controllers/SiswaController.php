<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::join('kelas','kelas.id','=','siswas.kelas_id')
                        ->select('siswas.id','nis','siswas.nama as nama_siswa','alamat','kelas.nama as kelas','tahun_ajaran')
                        ->get();
        return view('siswa.index',compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create',compact('kelas'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt('rahasia'),
        ]);
        $user->assignRole('siswa');
        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'tahun_ajaran' => $request->tahun_ajaran,
            'user_id'  => $user->id,
        ]);
        toastr()->success('Data berhasil di tambahkan', 'Berhasil');
        return redirect('data-siswa')->with('berhasil');
    }

    public function edit($id)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::find($id);
        $siswa->first();
        return view('siswa.edit',compact('siswa','kelas'));
    }

    public function update(Request $request,$id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        toastr()->success('Data berhasil di update', 'Berhasil');
        return redirect('data-siswa')->with('berhasil');
    }

    public function hapus($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        toastr()->success('Data berhasil di hapus', 'Berhasil');
        return redirect('data-siswa')->with('berhasil');
    }
}
