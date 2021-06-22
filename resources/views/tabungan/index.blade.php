@extends('layouts.master')

@section('title-pages','Data tabungan')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                menu
            </div>
            <div class="card-body">
                <a href="{{ url('tabungan/create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"> </i>
                    Data tabungan
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
                                <th>Saldo</th>
                                <th>Tahun ajaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tabungan as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>Rp.{{ number_format($data->saldo) }}</td>
                                <td>{{ $data->tahun_ajaran }}</td>
                                <td>
                                    <a href="{{ url('tabungan/edit',$data->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('tabungan/hapus',$data->id) }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
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
