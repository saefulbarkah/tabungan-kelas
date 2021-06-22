<?php

namespace App\Http\Controllers;

use App\Tabungan;
use App\Transaksi;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index()
    {
            $total = 0;
            $tabungan = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
                                    ->join('kelas','kelas.id','=','siswas.kelas_id')
                                    ->select('nis','tabungans.id','siswas.nama','kelas.nama as kelas','saldo')
                                    ->get();
            foreach ($tabungan as $value) {
                $total +=$value->saldo;
            }
            return view('transaksi.index',compact('tabungan','total'));

            // if ($request->has('cari')) {
            //     $tabungan = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
            //     ->join('kelas','kelas.id','=','siswas.kelas_id')
            //     ->select('nis','siswas.id','siswas.nama','kelas.nama as kelas','saldo')
            //     ->get();
            // }
    }

    public function create($id)
    {
        $tabungan = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
        ->join('kelas','kelas.id','=','siswas.kelas_id')
        ->join('transaksis','transaksis.tabungan_id','=','tabungans.id')
        ->select('nis','tabungans.id','siswas.nama','kelas.nama as kelas','tabungans.siswa_id','saldo')
        ->findOrFail($id);
        return view('transaksi.penarikan',compact('tabungan'));
    }

    public function store(Request $request, $id)
    {
        $tabungan = Tabungan::find($id);
        if ($request->nominal > $tabungan->saldo) {
            toastr()->error('Saldo tidak mencukupi','Error');
            return redirect()->back();
        }else{
            $tabungan->update([
                'saldo' => $tabungan->saldo - $request->nominal,
            ]);
            $transaksi = Transaksi::create([
                'siswa_id' => $request->siswa_id,
                'nominal'  => $request->nominal,
                'user_id'  => $request->user_id,
                'status'      => 'menarik',
                'tabungan_id' => $tabungan->id,
            ]);
        }
        toastr()->success('Data berhasil di tambahkan', 'Berhasil');
        return redirect('tabungan')->with('berhasil');
    }
}
