@extends('layouts.main-layout', ['page_title' => 'Data Tryout Saya', 'breadcrumb' => ['Data Tryout Saya'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Tryout Saya</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('hasiltryoutsiswa.create') }}" class="btn btn-block btn-success">Sinkronkan Tryout Saya</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Pukul</th>
              <th>Jenis</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clusters as $cluster)
            <tr>
              <td>{{ $cluster->kode }}</td>
              <td>{{ $cluster->nama }}</td>
              <td>{{ $cluster->nama }}</td>
              <td>{{ $cluster->klasifikasi }}</td>
              <td>
                <a href="{{ route('hasiltryoutsiswa.show', $cluster->id) }}">
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
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Pukul</th>
                <th>Jenis</th>
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