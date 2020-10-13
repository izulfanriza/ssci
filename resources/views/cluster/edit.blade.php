@extends('layouts.main-layout', ['page_title' => 'Edit Cluster', 'breadcrumb' => ['Cluster', 'Edit Cluster'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data Cluster</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('cluster.update', $cluster) }}" class="form-horizontal">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="kode">Kode Cluster</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode',$cluster->kode) }}" placeholder="Masukan Kode Cluster">
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
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama',$cluster->nama) }}" placeholder="Masukan Nama Cluster" required="required">
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
                            <input type="text" name="klasifikasi" class="form-control" id="klasifikasi" value="{{ old('klasifikasi',$cluster->klasifikasi) }}" placeholder="Masukan Klasifikasi Cluster" required="required">
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
                <button type="submit" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection