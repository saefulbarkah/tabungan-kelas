@extends('layouts.master')

@section('title-pages')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-primary shadow">
            <div class="card-header">
              <h3 class="card-title">Update tabungan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('tabungan/edit/post',$tabungan->id) }}" method="POST">
                @csrf
              <div class="card-body">
                <input type="hidden" name="siswa_id" id="" value="{{ $tabungan->siswa_id }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nis</label>
                  <input type="text" disabled class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $tabungan->nis }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama lengkap</label>
                  <input type="text" disabled class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $tabungan->nama }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Saldo</label>
                    <input type="number" name="saldo" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $tabungan->saldo }}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tambah saldo</label>
                    <input type="number" name="nominal" class="form-control" id="exampleInputEmail1" placeholder="" >
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
</div>
@endsection
