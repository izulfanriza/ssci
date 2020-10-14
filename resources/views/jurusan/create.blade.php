@extends('layouts.main-layout', ['page_title' => 'Tambah Jurusan', 'breadcrumb' => ['Jurusan', 'Tambah Jurusan'],])

@section('custom_css')
@include('components.css.select2')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Jurusan</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('jurusan.store') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nama">Nama Jurusan<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Jurusan" required="required">
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
                            <label for="nilai">Nilai Perhitungan<span class="text-danger">*</span></label>
                            <input type="number" name="nilai" class="form-control" id="nilai" value="{{ old('nilai') }}" placeholder="Masukan Nilai Perhitungan" required="required">
                            @error('nilai')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prioritas">Prioritas<span class="text-danger">*</span></label>
                            <select class="form-control" type="select" name="prioritas" value="{{ old('prioritas') }}">
                                <option disabled selected>--Pilih Prioritas--</option>
                                <option value="1" <?php echo old('prioritas') == '1' ? 'selected' : '' ;?>>1 (Satu)</option>
                                <option value="2" <?php echo old('prioritas') == '2' ? 'selected' : '' ;?>>2 (Dua)</option>
                            </select>
                            @error('prioritas')
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
                            <label for="kuota">Kuota<span class="text-danger">*</span></label>
                            <input type="number" name="kuota" class="form-control" id="kuota" value="{{ old('kuota') }}" placeholder="Masukan Kuota" required="required">
                            @error('kuota')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tahun">Tahun<span class="text-danger">*</span></label>
                            <input type="text" name="tahun" class="form-control" id="tahun" value="{{ old('tahun') }}" placeholder="Masukan Tahun" required="required">
                            @error('tahun')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukan Deskripsi">
                            @error('deskripsi')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="universitas">Universitas<span class="text-danger">*</span></label>
                            <select name="universitas" id="universitas" class="form-control select2 required">
                                <option selected disabled>--Pilih Universitas--</option>
                                <?php foreach($universitas as $row => $universitas): ?>
                                    <option value="<?php echo $universitas->kode;?>"><?php echo $universitas->nama;?></option> 
                                <?php EndForeach; ?>
                            </select>
                            @error('universitas')
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
                            <label for="cluster">Cluster<span class="text-danger">*</span></label>
                            <select name="cluster" id="cluster" class="form-control select2 required">
                                <option selected disabled>--Pilih Cluster--</option>
                                <?php foreach($clusters as $cluster): ?>
                                    <option value="<?php echo $cluster->kode;?>"><?php echo $cluster->kode;?></option> 
                                <?php EndForeach; ?>
                            </select>
                            @error('cluster')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="program_studi">Program Studi<span class="text-danger">*</span></label>
                            <select name="program_studi" id="program_studi" class="form-control select2 required">
                                <option selected disabled>--Pilih Program Studi--</option>
                                <?php foreach($program_studis as $program_studi): ?>
                                    <option value="<?php echo $program_studi->kode;?>"><?php echo $program_studi->nama;?></option> 
                                <?php EndForeach; ?>
                            </select>
                            @error('program_studi')
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
                <a type="button" href="{{ route('jurusan.index') }}" class="btn btn-default">Kembali</a>
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

@section('custom_script')
@include('components.js.select2')
@endsection