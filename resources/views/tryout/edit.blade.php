@extends('layouts.main-layout', ['page_title' => 'Edit Tryout', 'breadcrumb' => ['Tryout', 'Edit Tryout'],])

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
          <h3 class="card-title">Edit Data Tryout</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('tryout.update', $tryout) }}" class="form-horizontal">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Tryout<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $tryout->nama) }}" placeholder="Masukan Nama Tryout" required="required">
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
                                <option value="saintek" <?php echo old('jenis', $tryout->jenis) == 'saintek' ? 'selected' : '' ;?>>SAINTEK</option>
                                <option value="soshum" <?php echo old('jenis', $tryout->jenis) == 'soshum' ? 'selected' : '' ;?>>SOSHUM</option>
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
                            <label for="tanggal_tka">Tanggal Tryout TKA<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" value="{{ old('tanggal_tka',$tanggal_tka) }}" id="tanggal_tka" name="tanggal_tka" required="required">
                            </div>
                            @error('tanggal_tka')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pukul_tka">Pukul Tryout TKA<span class="text-danger">*</span></label>
                            <div class="bootstrap-timepicker">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-clock"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control timepicker" value="{{ old('pukul_tka',$pukul_tka) }}" name="pukul_tka" required="required">
                                </div>
                            </div>
                            @error('pukul_tka')
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
                            <label for="tanggal_tps">Tanggal Tryout TPS<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" value="{{ old('tanggal_tps',$tanggal_tps) }}" id="tanggal_tps" name="tanggal_tps" required="required">
                            </div>
                            @error('tanggal_tps')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pukul_tps">Pukul Tryout TPS<span class="text-danger">*</span></label>
                            <div class="bootstrap-timepicker">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-clock"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control timepicker" value="{{ old('pukul_tps',$pukul_tps) }}" name="pukul_tps" required="required">
                                </div>
                            </div>
                            @error('pukul_tps')
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
    $('#tanggal_tka').datepicker()
    $('#tanggal_tps').datepicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    })
  </script>
@endsection