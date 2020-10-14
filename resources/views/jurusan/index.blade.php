@extends('layouts.main-layout', ['page_title' => 'Jurusan', 'breadcrumb' => ['Jurusan'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Jurusan</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('jurusan.create') }}" class="btn btn-block btn-success">Tambah Jurusan</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Nilai Perhitungan</th>
              <th>Prioritas</th>
              <th>Kuota</th>
              <th>Tahun</th>
              <th>Universitas</th>
              <th>Cluster</th>
              <th>Program Studi</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jurusans as $jurusan)
            <tr>
              <td>{{ $jurusan->nama }}</td>
              <td>{{ $jurusan->nilai_perhitungan }}</td>
              <td>{{ $jurusan->prioritas }}</td>
              <td>{{ $jurusan->kuota }}</td>
              <td>{{ $jurusan->tahun }}</td>
              <td>{{ $jurusan->universitas_kode }}</td>
              <td>{{ $jurusan->cluster_kode }}</td>
              <td>{{ $jurusan->program_studi_kode }}</td>
              <td>
                <a href="{{ route('jurusan.edit', $jurusan->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </a>
                <form style="display: inline-block;" action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Nama</th>
                <th>Nilai Perhitungan</th>
                <th>Prioritas</th>
                <th>Kuota</th>
                <th>Tahun</th>
                <th>Universitas</th>
                <th>Cluster</th>
                <th>Program Studi</th>
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