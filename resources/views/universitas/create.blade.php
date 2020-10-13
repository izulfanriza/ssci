@extends('layouts.main-layout', ['page_title' => 'Tambah Universitas', 'breadcrumb' => ['Universitas', 'Tambah Universitas'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Universitas</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('universitas.store') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nama">Nama Universitas<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Universitas" required="required">
                            @error('nama')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="akronim">Akronim Universitas<span class="text-danger">*</span></label>
                            <input type="text" name="akronim" class="form-control" id="akronim" value="{{ old('akronim') }}" placeholder="Masukan Akronim Universitas" required="required">
                            @error('akronim')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kode">Kode Universitas<span class="text-danger">*</span></label>
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode') }}" placeholder="Masukan Kode Universitas" required="required">
                            @error('kode')
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
                <a type="button" href="{{ route('universitas.index') }}" class="btn btn-default">Kembali</a>
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