@extends('layouts.master')

@section('title-pages')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-primary shadow">
            <div class="card-header">
              <h3 class="card-title">Update data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('data-guru/edit/post',$guru->id) }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama lengkap</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" placeholder="" value="{{ $guru->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan ..." required>{{ $guru->alamat }}</textarea>
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
