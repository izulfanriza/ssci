@extends('layouts.main-layout', ['page_title' => 'Cari Data Tryout', 'breadcrumb' => ['Data Tryout Saya', 'Cari Data Tryout'],])

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
          <h3 class="card-title">Cari Data Tryout</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('hasiltryoutsiswa.gocari') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tryout_kode">Kode Tryout<span class="text-danger">*</span></label>
                            <input type="text" name="tryout_kode" class="form-control" id="tryout_kode" value="{{ old('tryout_kode') }}" placeholder="Masukan Kode Tryout" required="required">
                            @error('tryout_kode')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nomor">Nomor Peserta<span class="text-danger">*</span></label>
                            <input type="text" name="nomor" class="form-control" id="nomor" value="{{ old('nomor') }}" placeholder="Masukan Nomor Peserta" required="required">
                            @error('nomor')
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
                <a type="button" href="{{ route('hasiltryoutsiswa.index') }}" class="btn btn-default">Kembali</a>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary float-right">Cari</button>
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