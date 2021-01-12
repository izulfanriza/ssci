@extends('layouts.main-layout', ['page_title' => 'Buat Simulasi', 'breadcrumb' => ['Simulasi','Buat Simulasi'],])

@section('custom_css')
@include('components.css.select2')
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card card-secondary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="pt-2 px-3"><h3 class="card-title">Hitung Nilai UTBK</h3></li>
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-two-saintek-tab" data-toggle="pill" href="#custom-tabs-two-saintek" role="tab" aria-controls="custom-tabs-two-saintek" aria-selected="true">SAINTEK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-soshum-tab" data-toggle="pill" href="#custom-tabs-two-soshum" role="tab" aria-controls="custom-tabs-two-soshum" aria-selected="false">SOSHUM</a>
          </li>
        </ul>
      </div>


      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-two-saintek" role="tabpanel" aria-labelledby="custom-tabs-two-saintek-tab">
             <h5 class="card-header text-center">Masukkan Nilai</h5>
             <div class="row mt-3">
                 <div class="col">
                    <div class="card">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputMatematika" class="col-sm-7 col-form-label">Matematika</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="matematika">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFisika" class="col-sm-7 col-form-label">Fisika</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="fisika">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputKimia" class="col-sm-7 col-form-label">Kimia</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="kimia">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputBiologi" class="col-sm-7 col-form-label">Biologi</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="biologi">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                 </div>
                 <!-- /.col -->
                 <div class="col">
                    <div class="card">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputTps1" class="col-sm-7 col-form-label">K. Penalaran Umum</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="tps1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTps2" class="col-sm-7 col-form-label">M. Bacaan & Menulis</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="tps2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTps3" class="col-sm-7 col-form-label">Peng. & Pemahaman Umum</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="tps3">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTps4" class="col-sm-7 col-form-label">K. Kuantitatif</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="tps4">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                 </div>
                 <!-- /.col -->
             </div>
             <hr class="mt-2 mb-3"/>

             <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-center">Pilihan Jurusan 1</h6>
                    <div class="form-group">
                      <label for="universitas">Universitas<span class="text-danger">*</span></label>
                      <select name="universitas" id="universitas" class="form-control select2 required">
                          <option selected disabled>--Pilih Universitas--</option>
                          <?php foreach($universitas as $key => $universitas): ?>
                              <option value="<?php echo $universitas->kode;?>"><?php echo $universitas->nama;?></option> 
                          <?php EndForeach; ?>
                      </select>
                    </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="jurusan">Jurusan<span class="text-danger">*</span></label>
                    <select name="jurusan" id="jurusan" class="form-control select2 required">
                        <option disabled selected>--Pilih Jurusan--</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-center">Pilihan Jurusan 2</h6>
                  <div class="form-group">
                    <label>Universitas</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
              </div>
              <div class="col d-flex justify-content-center">
                <a href="{{ route('simulasi.index') }}"><button type="button" style="width: 100px" class="btn btn-block btn-default">Kembali</button></a>
                <a href="#"><button type="button" style="width: 100px" class="btn btn-block btn-info">Hitung</button></a>
              </div>
          </div>

          <div class="tab-pane fade" id="custom-tabs-two-soshum" role="tabpanel" aria-labelledby="custom-tabs-two-soshum-tab">
            <h5 class="card-header text-center">Masukkan Nilai</h5>
            <div class="row mt-3">
                <div class="col">
                   <div class="card">
                       <form class="form-horizontal">
                           <div class="card-body">
                               <div class="form-group row">
                                   <label for="inputMatematika" class="col-sm-7 col-form-label">Matematika</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="matematika">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputEkonomi" class="col-sm-7 col-form-label">Ekonomi</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="ekonomi">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputGeografi" class="col-sm-7 col-form-label">Geografi</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="geografi">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputSosiologi" class="col-sm-7 col-form-label">Sosiologi</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="sosiologi">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputSejarah" class="col-sm-7 col-form-label">Sejarah</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="sejarah">
                                   </div>
                               </div>
                           </div>
                           <!-- /.card-body -->
                       </form>
                   </div>
                </div>
                <!-- /.col -->
                <div class="col">
                   <div class="card">
                       <form class="form-horizontal">
                           <div class="card-body">
                               <div class="form-group row">
                                   <label for="inputTps5" class="col-sm-7 col-form-label">K. Penalaran Umum</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="tps5">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputTps6" class="col-sm-7 col-form-label">M. Bacaan & Menulis</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="tps6">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputTps7" class="col-sm-7 col-form-label">Peng. & Pemahaman Umum</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="tps7">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="inputTps8" class="col-sm-7 col-form-label">K. Kuantitatif</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="tps8">
                                   </div>
                               </div>
                           </div>
                           <!-- /.card-body -->
                       </form>
                   </div>
                </div>
                <!-- /.col -->
            </div>
            <hr class="mt-2 mb-3"/>

            <div class="row">
               <div class="col-md-6">
                   <h6 class="font-weight-bold text-center">Pilihan Jurusan 1</h6>
                 <div class="form-group">
                   <label>Universitas</label>
                   <select class="form-control select2" style="width: 100%;">
                     <option selected="selected">Alabama</option>
                     <option>Alaska</option>
                     <option>California</option>
                     <option>Delaware</option>
                     <option>Tennessee</option>
                     <option>Texas</option>
                     <option>Washington</option>
                   </select>
                 </div>
                 <!-- /.form-group -->
                 <div class="form-group">
                   <label>Jurusan</label>
                   <select class="form-control select2" style="width: 100%;">
                     <option selected="selected">Alabama</option>
                     <option>Alaska</option>
                     <option>California</option>
                     <option>Delaware</option>
                     <option>Tennessee</option>
                     <option>Texas</option>
                     <option>Washington</option>
                   </select>
                 </div>
                 <!-- /.form-group -->
               </div>
               <div class="col-md-6">
                   <h6 class="font-weight-bold text-center">Pilihan Jurusan 2</h6>
                 <div class="form-group">
                   <label>Universitas</label>
                   <select class="form-control select2" style="width: 100%;">
                     <option selected="selected">Alabama</option>
                     <option>Alaska</option>
                     <option>California</option>
                     <option>Delaware</option>
                     <option>Tennessee</option>
                     <option>Texas</option>
                     <option>Washington</option>
                   </select>
                 </div>
                 <!-- /.form-group -->
                 <div class="form-group">
                   <label>Jurusan</label>
                   <select class="form-control select2" style="width: 100%;">
                     <option selected="selected">Alabama</option>
                     <option>Alaska</option>
                     <option>California</option>
                     <option>Delaware</option>
                     <option>Tennessee</option>
                     <option>Texas</option>
                     <option>Washington</option>
                   </select>
                 </div>
                 <!-- /.form-group -->
               </div>
             </div>
             <div class="col d-flex justify-content-center">
                <a href="{{ route('simulasi.index') }}"><button type="button" style="width: 100px" class="btn btn-block btn-default">Kembali</button></a>
                <a href="#"><button type="button" style="width: 100px" class="btn btn-block btn-info">Hitung</button></a>
             </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
  </div>
  <!-- /.row -->

  @endsection

@section('custom_script')
@include('components.js.select2')
<script>
    $(document).ready(function () {
    $(document).on('change', '#universitas', function() {
        var universitas_kode = $(this).val();
        var jenis_program_studi = $('#jenis_program_studi').val();
        // alert(jenis_program_studi);
        var div = $(this).parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('hasiltryoutsiswa/finduniversitas')!!}',
            data: {'kode':universitas_kode, 'jenis_program_studi':jenis_program_studi},
            success: function(data){
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].kode+'">'+data[i].nama+'</option>';
                }
                $('#jurusan').html(" ");
                $('#jurusan').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
});
</script>
@endsection