@extends('layouts.master')

@section('title-pages','Dashboard')
@section('content')
<div class="row">
    @hasrole('admin|guru')
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data siswa</span>
          <span class="info-box-number">
            {{ $siswa }}
            <small></small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    @endhasrole

    <!-- /.col -->
    @hasrole('admin')
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Guru</span>
          <span class="info-box-number">{{ $guru }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    @endhasrole
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    @hasrole('guru')
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Saldo</span>
          <span class="info-box-number">Rp.{{ number_format($total) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    @endhasrole
    <!-- /.col -->
    @hasrole('siswa')
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Saldo</span>
            <span class="info-box-number">
                @empty(!$saldo)
                Rp.{{ number_format($saldo->saldo) }}
                @else
                0
                @endempty
                {{-- @if (!$saldo->saldo->isEmpety())

                @endif --}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    @endhasrole
    <!-- /.col -->
  </div>
@hasrole('siswa')
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
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Tanggal pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas }}</td>
                                @if ($data->status == 'menabung')
                                <td>Rp.{{ number_format($data->nominal) }}</td>
                                <td><span class="badge badge-info">{{ $data->status }}</span></td>
                                @else
                                <td>- Rp.{{ number_format($data->nominal) }}</td>
                                <td><span class="badge badge-danger">{{ $data->status }}</span></td>
                                @endif
                                <td>{{ $data->created_at->format('d M Y - H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endhasrole
@endsection
