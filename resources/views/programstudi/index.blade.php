@extends('layouts.main-layout', ['page_title' => 'Program Studi', 'breadcrumb' => ['Program Studi'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Program Studi</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('programstudi.create') }}" class="btn btn-block btn-success">Tambah Program Studi</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Kode</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($program_studis as $program_studi)
            <tr>
              <td>{{ $program_studi->kode }}</td>
              <td>{{ $program_studi->nama }}</td>
              <td>
                <a href="{{ route('programstudi.edit', $program_studi->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </a>
                <form style="display: inline-block;" action="{{ route('programstudi.destroy', $program_studi->id) }}" method="POST">
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