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
            <form action="{{ url('data-siswa/create/post') }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NIS</label>
                  <input type="number" name="nis" class="form-control" id="exampleInputEmail1" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama lengkap</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="exampleSelectRounded0">Kelas</label>
                    <select name="kelas_id" class="custom-select rounded-0" id="exampleSelectRounded0" required>
                        @foreach ($kelas as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="" required>
                </div>
                  <div class="form-group">
                    <label>Tahun Ajaran</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input name="tahun_ajaran" type="text" class="form-control float-right" id="reservation" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan ..." required></textarea>
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
