<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class HistoryTransaksi extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::join('siswas','siswas.id','=','transaksis.siswa_id')
                                ->join('kelas','kelas.id','=','siswas.kelas_id')
                                ->select('siswas.nis','siswas.nama','kelas.nama as kelas','nominal','transaksis.id','transaksis.created_at','status')
                                ->get();
        return view('transaksi.history',compact('transaksi'));
    }
    public function cetak_pdf()
    {
        $transaksi = Transaksi::join('siswas','siswas.id','=','transaksis.siswa_id')
                                ->join('kelas','kelas.id','=','siswas.kelas_id')
                                ->select('siswas.nis','siswas.nama','kelas.nama as kelas','nominal','transaksis.id','transaksis.created_at','status')
                                ->get();
        $pdf = PDF::loadview('transaksi.transaksi_pdf',compact('transaksi'));
        return $pdf->download('laporan_transaksi-pdf.pdf');
    }
}
