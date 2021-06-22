<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Tabungan;
use App\Transaksi;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungan = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
                                ->join('kelas','kelas.id','=','siswas.kelas_id')
                                ->select('kelas.nama as kelas','siswas.nama','saldo','nis','tabungans.id','siswas.tahun_ajaran')
                                ->get();
        return view('tabungan.index',compact('tabungan'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('tabungan.create',compact('siswa'));
    }

    public function store(Request $request)
    {
        // dd($request->siswa_id);
        // dd(Tabungan::first('siswa_id'));

        $pesan = [
            'unique' => ':attribute sudah terdaftar',
            'required' => ':attribute wajib di isi',
        ];
        $this->validate($request,[
            'siswa_id' => 'required|unique:transaksis,siswa_id',
        ],$pesan);

        $tabungan = Tabungan::create([
            'siswa_id'    => $request->siswa_id,
            'saldo'       => $request->nominal,
            'user_id'     => $request->user_id,
        ]);

        $transaksi = Transaksi::create([
            'siswa_id' => $request->siswa_id,
            'nominal'  => $request->nominal,
            'user_id'  => $request->user_id,
            'status'      => 'menabung',
            'tabungan_id' => $tabungan->id,
        ]);
        toastr()->success('Data berhasil di tambahkan', 'Berhasil');
        return redirect('tabungan')->with('berhasil');
    }

    public function edit($id)
    {
        $tabungan = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
                                ->join('kelas','kelas.id','=','siswas.kelas_id')
                                ->select('kelas.nama as kelas','siswas.nama','saldo','nis','tabungans.id','tabungans.siswa_id')
                                ->find($id);
        return view('tabungan.edit',compact('tabungan'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nominal' => '',
        ]);
        $tabungan = Tabungan::findOrFail($id);
        $tabungan->update([
            'siswa_id' => $request->siswa_id,
            'saldo' => $tabungan->saldo+$request->nominal,
            'user_id' => auth()->user()->id,
        ]);
        $transaksi = Transaksi::create([
            'siswa_id' => $request->siswa_id,
            'nominal'  => $request->nominal,
            'user_id' => auth()->user()->id,
            'status'      => 'menabung',
            'tabungan_id' => $tabungan->id,
        ]);

        toastr()->success('Data berhasil di update', 'Berhasil');
        return redirect('tabungan');
    }

    public function hapus($id)
    {
        $tabungan = Tabungan::find($id);
        $transaksi = Transaksi::join('tabungans','tabungans.id','=','transaksis.tabungan_id')
                                ->select('transaksis.tabungan_id','transaksis.id','transaksis.siswa_id')
                                ->where('transaksis.tabungan_id',$id)
                                ->delete();
        $tabungan->delete();
        toastr()->success('Data berhasil di haous', 'Berhasil');
        return redirect('tabungan');
    }
}
