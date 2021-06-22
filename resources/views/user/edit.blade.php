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
            <form action="{{ url('data-user/edit/post',$user->id) }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama lengkap</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="exampleSelectRounded0">role</label>
                    <select name="role" class="custom-select rounded-0" id="exampleSelectRounded0">
                        @foreach ($role as $data)
                        <option value="{{ $data->id }}" {{ ($data->id == $user->roles->first()->id) ? 'selected' : '' }}>{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">password</label>
                  <input type="password" disabled name="password" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $user->password }}">
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
