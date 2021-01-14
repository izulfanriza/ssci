@extends('layouts.main-layout', ['page_title' => 'Simulasi', 'breadcrumb' => ['Simulasi'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Simulasi</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('simulasi.create') }}" class="btn btn-block btn-success">Buat Simulasi Baru</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Universitas</th>
              <th>Jurusan</th>
              <th>Prioritas</th>
              <th style="width: 20%">Hasil</th>
              <th>Lihat Rekomendasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($simulasis as $simulasi)
            <tr>
              <td>{{ $simulasi->nama_universitas }}</td>
                <td>{{ $simulasi->nama_jurusan }}</td>
                <td>{{ $simulasi->pilihan }}</td>
                <td>
                  @if ($simulasi->hasil == 'lolos')<span class="badge bg-success">Lolos</span>@endif
                  @if($simulasi->hasil != 'lolos')
                    <span class="badge bg-danger">Tidak Lolos</span>
                  @endif
                </td>
              <td>
                @if($simulasi->hasil == 'tidaklolos_terekomendasi')
                  <a href="{{ route('simulasi.show', $simulasi->id) }}">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                  </a>
                @endif
                @if($simulasi->hasil == 'tidaklolos')
                  <a href="{{ route('simulasi.rekomendasi', $simulasi->id) }}">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-info">Dapatkan Rekomendasi</button>
                    </div>
                  </a>
                @endif
                @if($simulasi->hasil == 'lolos')
                  -
                @endif
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Prioritas</th>
                <th>Hasil</th>
                <th>Lihat Rekomendasi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection

@section('custom_script')
@include('components.js.datatable')
@endsection