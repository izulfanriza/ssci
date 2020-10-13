@extends('layouts.main-layout', ['page_title' => 'Universitas', 'breadcrumb' => ['Universitas'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Universitas</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('universitas.create') }}" class="btn btn-block btn-success">Tambah Universitas</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Kode</th>
              <th>Nama</th>
              <th>Akronim</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($universitas as $row => $universitas)
            <tr>
              <td>{{ $universitas->kode }}</td>
              <td>{{ $universitas->nama }}</td>
              <td>{{ $universitas->akronim }}</td>
              <td>
                <a href="{{ route('universitas.edit', $universitas->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </a>
                <form style="display: inline-block;" action="{{ route('universitas.destroy', $universitas->id) }}" method="POST">
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
                <th>Akronim</th>
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