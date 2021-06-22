@extends('layouts.master')

@section('title-pages','Data siswa')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                menu
            </div>
            <div class="card-body">
                <a href="{{ url('data-siswa/create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"> </i>
                    Data siswa
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
                                <th>Alamat</th>
                                <th>Tahun ajaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama_siswa }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->tahun_ajaran }}</td>
                                <td>
                                    <a href="{{ url('data-siswa/edit',$data->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('data-siswa/hapus',$data->id) }}" class="btn btn-danger btn-sm">
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
