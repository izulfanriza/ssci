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
              <th>Jenis</th>
              <th>Pilihan 1 - Status</th>
              <th>Pilihan 2 - Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clusters as $cluster)
            <tr>
              <td>{{ $cluster->kode }}</td>
              <td>{{ $cluster->nama }} &nbsp;-&nbsp; <span class="badge bg-success">Lolos</span></td>
              <td>{{ $cluster->klasifikasi }} &nbsp;-&nbsp; <span class="badge bg-danger">Gagal</span></td>
              <td>
                <a href="{{ route('simulasi.show', $cluster->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Jenis</th>
                <th>Pilihan 1 - Status</th>
                <th>Pilihan 2 - Status</th>
                <th>Aksi</th>
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