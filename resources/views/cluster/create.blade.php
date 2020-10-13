@extends('layouts.main-layout', ['page_title' => 'Tambah Cluster', 'breadcrumb' => ['Cluster', 'Tambah Cluster'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Cluster</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('cluster.store') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="kode">Kode Cluster<span class="text-danger">*</span></label>
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode') }}" placeholder="Masukan Kode Cluster" required="required">
                            @error('kode')
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
                            <label for="nama">Nama Cluster<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Cluster" required="required">
                            @error('nama')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="klasifikasi">Klasifikasi Cluster<span class="text-danger">*</span></label>
                            <input type="text" name="klasifikasi" class="form-control" id="klasifikasi" value="{{ old('klasifikasi') }}" placeholder="Masukan Klasifikasi Cluster" required="required">
                            @error('klasifikasi')
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
                <a type="button" href="{{ route('cluster.index') }}" class="btn btn-default">Kembali</a>
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