@extends('layouts.master')

@section('title-pages','Data guru')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                menu
            </div>
            <div class="card-body">
                <a href="{{ url('data-guru/create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"> </i>
                    Data guru
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
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guru as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    <a href="{{ url('data-guru/edit',$data->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('data-guru/hapus',$data->id) }}" class="btn btn-danger btn-sm">
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
