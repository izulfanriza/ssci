@extends('layouts.main-layout', ['page_title' => 'Rekomendasi', 'breadcrumb' => ['Simulasi','Rekomendasi'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Rekomendasi Jurusan</h3>
          <div class="card-tools">
            {{-- <a type="button" href="{{ route('simulasi.create') }}" class="btn btn-block btn-success">Buat Simulasi Baru</a> --}}
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Universitas</th>
              <th>Jurusan</th>
              <th>Nilai Perhitungan</th>
              <th>Kuota - Tahun</th>
              <th>Prioritas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rekomendasi as $key => $rekomendasi)
            <tr>
              <td>{{ $rekomendasi->universitas }}</td>
              <td>{{ $rekomendasi->nama }}</td>
              <td>{{ $rekomendasi->nilai_perhitungan }}</td>
              <td>{{ $rekomendasi->kuota.' - '.$rekomendasi->tahun }}</td>
              <td>{{ $rekomendasi->prioritas }}</td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Nilai Perhitungan</th>
                <th>Kuota - Tahun</th>
                <th>Prioritas</th>
              </tr>
            </tfoot>
          </table>
          <div class="col d-flex justify-content-center">
            <a href="{{ route('simulasi.index') }}" style="width: 200px" class="btn btn-block btn-default">Kembali</a>
          </div>
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