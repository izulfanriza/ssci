@extends('layouts.main-layout', ['page_title' => 'Tambah Tryout', 'breadcrumb' => ['Tryout', 'Tambah Tryout'],])

@section('custom_css')
<!-- datepicker -->
  <link rel="stylesheet" href="{{asset ('adminlte2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset ('adminlte2/plugins/timepicker/bootstrap-timepicker.min.css') }}">

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Tryout</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('tryout.store') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Tryout<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Tryout" required="required">
                            @error('nama')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jenis">Jenis<span class="text-danger">*</span></label>
                            <select class="form-control" type="select" name="jenis" value="{{ old('jenis') }}">
                                <option disabled selected>--Pilih Jenis--</option>
                                <option value="saintek" <?php echo old('jenis') == 'saintek' ? 'selected' : '' ;?>>SAINTEK</option>
                                <option value="soshum" <?php echo old('jenis') == 'soshum' ? 'selected' : '' ;?>>SOSHUM</option>
                                <option value="tps" <?php echo old('jenis') == 'tps' ? 'selected' : '' ;?>>TPS</option>
                            </select>
                            @error('jenis')
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
                            <label for="tanggal">Tanggal Tryout<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" id="tanggal" name="tanggal" required="required">
                            </div>
                            @error('tanggal')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pukul">Pukul Tryout<span class="text-danger">*</span></label>
                            <div class="bootstrap-timepicker">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-clock"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control timepicker" name="pukul" required="required">
                                </div>
                            </div>
                            @error('pukul')
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
                <a type="button" href="{{ route('tryout.index') }}" class="btn btn-default">Kembali</a>
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
<!-- date--picker -->
<script src="{{asset ('adminlte2/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{asset ('adminlte2/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{asset ('adminlte2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>

<!-- bootstrap time picker -->
<script src="{{asset ('adminlte2/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script>
    $(function () {
  
    //Date range picker
    $('#tanggal').datepicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    })
  </script>
@endsection