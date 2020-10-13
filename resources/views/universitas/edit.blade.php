@extends('layouts.main-layout', ['page_title' => 'Edit Universitas', 'breadcrumb' => ['Universitas', 'Edit Universitas'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data Universitas</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('universitas.update', $universitas) }}" class="form-horizontal">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nama">Nama Universitas</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama',$universitas->nama) }}" placeholder="Masukan Nama Universitas">
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
                            <input type="text" name="akronim" class="form-control" id="akronim" value="{{ old('akronim',$universitas->akronim) }}" placeholder="Masukan Akronim Universitas" required="required">
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
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode',$universitas->kode) }}" placeholder="Masukan Kode Universitas" required="required">
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
                <button type="submit" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection