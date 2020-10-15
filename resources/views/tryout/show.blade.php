@extends('layouts.main-layout', ['page_title' => 'Peserta', 'breadcrumb' => ['Tryout', 'Peserta'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Peserta Tryout
              <br> {{ $tryout->nama }} 
              <br> {{ 'TKA: '. $tryout->tanggal_indo_tka .' - ' .  $tryout->pukul_tka }}
              <br> {{ 'TPS: '. $tryout->tanggal_indo_tps .' - ' .  $tryout->pukul_tps }}</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('tryout.create') }}" class="btn btn-block btn-success">Tambah Data Peserta</a>
            <a type="button" href="{{ route('tryout.create') }}" class="btn btn-block btn-primary pull-right">Upload Data Peserta</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nomor Peserta</th>
                <th>Nama Peserta</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pesertas as $peserta)
            <tr>
              <td>{{ $peserta->nama }}</td>
              <td>{{ $peserta->nomor }}</td>
              <td>
                <a href="{{ route('tryout.show', $peserta->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-success">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </a>
                <a href="{{ route('tryout.edit', $peserta->id) }}">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </a>
                <form style="display: inline-block;" action="{{ route('tryout.destroy', $peserta->id) }}" method="POST">
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
                <th>Nomor Peserta</th>
                <th>Nama Peserta</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
          <div class="card-tools">
            <hr>
            <a type="button" href="{{ route('tryout.index') }}" class="btn btn-block btn-default pull-right" style="width: 10%;">Kembali</a>
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