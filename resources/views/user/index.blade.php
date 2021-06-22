@extends('layouts.master')

@section('title-pages','Data user')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                menu
            </div>
            <div class="card-body">
                <a href="{{ url('data-user/create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"> </i>
                    Data user
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->getRoleNames()->implode('') }}</td>
                                <td>
                                    <a href="{{ url('data-user/edit',$data->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('data-user/hapus',$data->id) }}" class="btn btn-danger btn-sm">
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
