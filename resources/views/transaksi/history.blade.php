@extends('layouts.master')

@section('title-pages','History transaksi')
@section('content')
<div class="row">
    <div class="col">
        <div class="card card-primary shadow">
            <div class="card-header">
            </div>
            <div class="card-body">
                <a href="{{ url('history-transaksi/cetak_pdf') }}" class="btn btn-primary">
                    <i class="fa fa-print"></i> Export pdf
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow ">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nis</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Tanggal pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas }}</td>
                                @if ($data->status == 'menabung')
                                <td>Rp.{{ number_format($data->nominal) }}</td>
                                <td><span class="badge badge-info">{{ $data->status }}</span></td>
                                @else
                                <td>- Rp.{{ number_format($data->nominal) }}</td>
                                <td><span class="badge badge-danger">{{ $data->status }}</span></td>
                                @endif
                                <td>{{ $data->created_at->format('d M Y - H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
