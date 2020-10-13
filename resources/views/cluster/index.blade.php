@extends('layouts.main-layout', ['page_title' => 'Cluster', 'breadcrumb' => ['Cluster'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Cluster</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('cluster.create') }}" class="btn btn-block btn-success">Tambah Cluster</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Kode</th>
              <th>Nama</th>
              <th>Klasifikasi</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clusters as $cluster)
            <tr>
              <td>{{ $cluster->kode }}</td>
              <td>{{ $cluster->nama }}</td>
              <td>{{ $cluster->klasifikasi }}</td>
              <td>
                <a href="{{ route('cluster.edit', $cluster->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </a>
                <form style="display: inline-block;" action="{{ route('cluster.destroy', $cluster->id) }}" method="POST">
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
                <th>Kode</th>
                <th>Nama</th>
                <th>Klasifikasi</th>
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