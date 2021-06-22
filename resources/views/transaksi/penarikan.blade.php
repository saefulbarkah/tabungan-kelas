@extends('layouts.master')

@section('title-pages','Penarikan tabungan')
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-md-9">
        <div class="card card-success">
            <div class="card-header">
                <h5>Form penarikan saldo</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('penarikan/create/post',$tabungan->id) }}" method="POST">
                    @csrf
                  <div class="card-body">
                      <input type="hidden" name="siswa_id" id="" value="{{ $tabungan->siswa_id }}">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIS</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $tabungan->nis }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama lengkap</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $tabungan->nama }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Saldo</label>
                      <input type="number" name="saldo" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $tabungan->saldo }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nominal</label>
                      <input type="number" name="nominal" class="form-control" id="exampleInputEmail1" placeholder="">
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
</div>
@endsection
