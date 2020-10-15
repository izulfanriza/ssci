@extends('layouts.main-layout', ['page_title' => 'Edit Mata Pelajaran', 'breadcrumb' => ['Mata Pelajaran', 'Edit Mata Pelajaran'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data Mata Pelajaran</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('mapel.update', $mapel) }}" class="form-horizontal">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kode">Kode Mata Pelajaran</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode',$mapel->kode) }}" placeholder="Masukan Kode Mata Pelajaran">
                            @error('kode')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Mata Pelajaran<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama',$mapel->nama) }}" placeholder="Masukan Nama Mata Pelajaran" required="required">
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
                <a type="button" href="{{ route('mapel.index') }}" class="btn btn-default">Kembali</a>
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