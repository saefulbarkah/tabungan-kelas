@extends('layouts.master')

@section('title-pages','Penarikan tabungan')
@section('content')
<div class="row">
    <div class="col">
        <div class="card card-primary shadow">
            <div class="card-header">
              <h3 class="card-title">Pencarian siswa</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    <i class="fas fa-search"></i> Tabungan siswa
                </button>
            </div>
        </div>
        <div class="card card-warning shadow">
            <div class="card-header">
                <h3 class="card-title">Informasi</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Total Saldo</th>
                            <th>:</th>
                            <td>{{ $total }}</td>
                        </tr>
                        <tr>
                            <th>Total Siswa menabung</th>
                            <th>:</th>
                            <td>{{ $tabungan->count() }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data tabungan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table  id="example2" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Saldo</th>
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
                    <td>
                        <a href="{{ url('penarikan',$data->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-check"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
