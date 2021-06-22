@extends('layouts.master')

@section('title-pages')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card card-primary shadow">
            <div class="card-header">
              <h3 class="card-title">Tambah data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('tabungan/create/post') }}" method="POST">
                @csrf
              <div class="card-body">
                  <div class="form-group">
                      <label>Pilih siswa</label>
                      <select class="form-control select2bs4 @error('siswa_id') is-invalid @enderror" style="width: 100%;" name="siswa_id">
                        <option value="" disabled selected>--- pilih siswa ---</option>
                        @foreach ($siswa as $data)
                        <option value="{{ $data->id }}">{{ $data->nama}} | {{ $data->nis }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nominal</label>
                  <input type="number" name="nominal" class="form-control  @error('nominal') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                  @error('siswa_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="form-group">
                  <input type="hidden" name="user_id" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ auth()->user()->id }}">
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
