<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Siswa;
use App\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $guru = Guru::count();
        $total = 0;
        $tabungan1 = Tabungan::all();
        $saldo = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
                                ->join('users','users.id','=','siswas.user_id')
                                ->join('kelas','kelas.id','=','siswas.kelas_id')
                                ->join('transaksis','transaksis.tabungan_id','=','tabungans.id')
                                ->select('siswas.user_id','saldo')
                                ->where('siswas.user_id',auth()->user()->id)->first();
        foreach ($tabungan1 as $value) {
            $total +=$value->saldo;
        }
        $history = Tabungan::join('siswas','siswas.id','=','tabungans.siswa_id')
                            ->join('users','users.id','=','siswas.user_id')
                            ->join('kelas','kelas.id','=','siswas.kelas_id')
                            ->join('transaksis','transaksis.tabungan_id','=','tabungans.id')
                            ->select('nis','siswas.user_id','saldo','siswas.nama','kelas.nama as kelas','status','transaksis.created_at','transaksis.nominal')
                            ->where('siswas.user_id',auth()->user()->id)->get();

        return view('dashboard',compact('siswa','guru','total','saldo','history'));
    }
}
