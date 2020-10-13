@extends('layouts.main-layout', ['page_title' => 'Tambah Program Studi', 'breadcrumb' => ['Program Studi', 'Tambah Program Studi'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Program Studi</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('programstudi.store') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kode">Kode Program Studi<span class="text-danger">*</span></label>
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode') }}" placeholder="Masukan Kode Program Studi" required="required">
                            @error('kode')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Program Studi<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Program Studi" required="required">
                            @error('nama')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0"></div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a type="button" href="{{ route('programstudi.index') }}" class="btn btn-default">Kembali</a>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection