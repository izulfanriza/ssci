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
        @if(Auth::user()->role=='siswabiasa')
        <li class="pt-2 px-3"><div class="alert-warning rounded">
            Simulasi untuk siswa biasa maksimal 3 (tiga) kali perhitungan. Silahkan upgrade ke akun premium, <a style="color: #007bff" href="{{ url('/upgrade') }}">klik disini</a>
          </div></li>
        </ul>
        @endif
      </div>


      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">

            <div class="tab-pane fade show active" id="custom-tabs-two-saintek" role="tabpanel" aria-labelledby="custom-tabs-two-saintek-tab">
              <form method="POST" action="{{ route('simulasi.store') }}" class="form-horizontal">
             <h5 class="card-header text-center">Masukkan Nilai</h5>
             
             <div class="row mt-3">
                 <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row" hidden>
                                <label for="saintek" class="col-sm-7 col-form-label">SAINTEK</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="saintek" name="program_studi_kode" value="saintek">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputMatematika" class="col-sm-7 col-form-label">Matematika<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="matematika" name="matematika" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputFisika" class="col-sm-7 col-form-label">Fisika<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="fisika" name="fisika" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputKimia" class="col-sm-7 col-form-label">Kimia<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="kimia" name="kimia" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputBiologi" class="col-sm-7 col-form-label">Biologi<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="biologi" name="biologi" required>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="k_penalaran_umum_saintek" class="col-sm-7 col-form-label">K. Penalaran Umum<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="k_penalaran_umum_saintek" name="k_penalaran_umum_saintek">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="m_bacaan_dan_menulis_saintek" class="col-sm-7 col-form-label">M. Bacaan & Menulis<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="m_bacaan_dan_menulis_saintek" name="m_bacaan_dan_menulis_saintek">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="peng_dan_pemahaman_umum_saintek" class="col-sm-7 col-form-label">Peng. & Pemahaman Umum<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="peng_dan_pemahaman_umum_saintek" name="peng_dan_pemahaman_umum_saintek">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="k_kuantitatif_saintek" class="col-sm-7 col-form-label">K. Kuantitatif<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="k_kuantitatif_saintek" name="k_kuantitatif_saintek">
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
             
             <hr class="mt-2 mb-3"/>

             <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-center">Pilihan Jurusan 1</h6>
                    <div class="form-group">
                      <label for="universitas_saintek1">Universitas<span class="text-danger">*</span></label>
                      <select name="universitas_saintek1" id="universitas_saintek1" class="form-control select2 required">
                          <option selected disabled>--Pilih Universitas--</option>
                          <?php foreach($universitas_a1 as $key => $universitas_a1): ?>
                              <option value="<?php echo $universitas_a1->kode;?>"><?php echo $universitas_a1->nama;?></option> 
                          <?php EndForeach; ?>
                      </select>
                    </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="jurusan_saintek1">Jurusan<span class="text-danger">*</span></label>
                    <select name="jurusan_saintek1" id="jurusan_saintek1" class="form-control select2 required">
                        <option disabled selected>--Pilih Jurusan--</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-center">Pilihan Jurusan 2</h6>
                    <div class="form-group">
                      <label for="universitas_saintek2">Universitas<span class="text-danger">*</span></label>
                      <select name="universitas_saintek2" id="universitas_saintek2" class="form-control select2 required">
                          <option selected disabled>--Pilih Universitas--</option>
                          <?php foreach($universitas_a2 as $key => $universitas_a2): ?>
                              <option value="<?php echo $universitas_a2->kode;?>"><?php echo $universitas_a2->nama;?></option> 
                          <?php EndForeach; ?>
                      </select>
                    </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="jurusan_saintek2">Jurusan<span class="text-danger">*</span></label>
                    <select name="jurusan_saintek2" id="jurusan_saintek2" class="form-control select2 required">
                        <option disabled selected>--Pilih Jurusan--</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                
              </div>

              <div class="col d-flex justify-content-center">
                <a href="{{ route('simulasi.index') }}" style="width: 100px" class="btn btn-block btn-default">Kembali</a> &emsp;
                {{ csrf_field() }}
                <button type="submit" style="width: 100px" class="btn btn-primary float-right">Hitung</button>
              </div>
            </form>
          </div>

          <div class="tab-pane fade" id="custom-tabs-two-soshum" role="tabpanel" aria-labelledby="custom-tabs-two-soshum-tab">
            <form method="POST" action="{{ route('simulasi.store') }}" class="form-horizontal">
                <h5 class="card-header text-center">Masukkan Nilai</h5>
                
                <div class="row mt-3">
                    <div class="col">
                       <div class="card">
                           <div class="card-body">
                               <div class="form-group row" hidden>
                                   <label for="soshum" class="col-sm-7 col-form-label">SOSHUM</label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" id="soshum" name="program_studi_kode" value="soshum">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="matematika_soshum" class="col-sm-7 col-form-label">Matematika<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="matematika_soshum" name="matematika_soshum" required>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="ekonomi" class="col-sm-7 col-form-label">Ekonomi<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="ekonomi" name="ekonomi" required>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="geografi" class="col-sm-7 col-form-label">Geografi<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="geografi" name="geografi" required>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="sosiologi" class="col-sm-7 col-form-label">Sosiologi<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="sosiologi" name="sosiologi" required>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="sejarah" class="col-sm-7 col-form-label">Sejarah<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="sejarah" name="sejarah" required>
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="col">
                       <div class="card">
                           <div class="card-body">
                               <div class="form-group row">
                                   <label for="k_penalaran_umum_soshum" class="col-sm-7 col-form-label">K. Penalaran Umum<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="k_penalaran_umum_soshum" name="k_penalaran_umum_soshum">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="m_bacaan_dan_menulis_soshum" class="col-sm-7 col-form-label">M. Bacaan & Menulis<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="m_bacaan_dan_menulis_soshum" name="m_bacaan_dan_menulis_soshum">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="peng_dan_pemahaman_umum_soshum" class="col-sm-7 col-form-label">Peng. & Pemahaman Umum<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="peng_dan_pemahaman_umum_soshum" name="peng_dan_pemahaman_umum_soshum">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="k_kuantitatif_soshum" class="col-sm-7 col-form-label">K. Kuantitatif<span class="text-danger">*</span></label>
                                   <div class="col-sm-3">
                                       <input type="text" class="form-control" placeholder="Masukan Nilai" id="k_kuantitatif_soshum" name="k_kuantitatif_soshum">
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
                
                <hr class="mt-2 mb-3"/>
   
                <div class="row">
                   <div class="col-md-6">
                       <h6 class="font-weight-bold text-center">Pilihan Jurusan 1</h6>
                       <div class="form-group">
                         <label for="universitas_soshum1">Universitas<span class="text-danger">*</span></label>
                         <select name="universitas_soshum1" id="universitas_soshum1" class="form-control select2 required">
                             <option selected disabled>--Pilih Universitas--</option>
                             <?php foreach($universitas_o1 as $key => $universitas_o1): ?>
                                 <option value="<?php echo $universitas_o1->kode;?>"><?php echo $universitas_o1->nama;?></option> 
                             <?php EndForeach; ?>
                         </select>
                       </div>
                     <!-- /.form-group -->
                     <div class="form-group">
                       <label for="jurusan_soshum1">Jurusan<span class="text-danger">*</span></label>
                       <select name="jurusan_soshum1" id="jurusan_soshum1" class="form-control select2 required">
                           <option disabled selected>--Pilih Jurusan--</option>
                       </select>
                     </div>
                     <!-- /.form-group -->
                   </div>
                   <div class="col-md-6">
                       <h6 class="font-weight-bold text-center">Pilihan Jurusan 2</h6>
                       <div class="form-group">
                         <label for="universitas_soshum2">Universitas<span class="text-danger">*</span></label>
                         <select name="universitas_soshum2" id="universitas_soshum2" class="form-control select2 required">
                             <option selected disabled>--Pilih Universitas--</option>
                             <?php foreach($universitas_o2 as $key => $universitas_o2): ?>
                                 <option value="<?php echo $universitas_o2->kode;?>"><?php echo $universitas_o2->nama;?></option> 
                             <?php EndForeach; ?>
                         </select>
                       </div>
                     <!-- /.form-group -->
                     <div class="form-group">
                       <label for="jurusan_soshum2">Jurusan<span class="text-danger">*</span></label>
                       <select name="jurusan_soshum2" id="jurusan_soshum2" class="form-control select2 required">
                           <option disabled selected>--Pilih Jurusan--</option>
                       </select>
                     </div>
                     <!-- /.form-group -->
                   </div>
                   
                 </div>
   
                 <div class="col d-flex justify-content-center">
                   <a href="{{ route('simulasi.index') }}" style="width: 100px" class="btn btn-block btn-default">Kembali</a> &emsp;
                   {{ csrf_field() }}
                   <button type="submit" style="width: 100px" class="btn btn-primary float-right">Hitung</button>
                 </div>
               </form>
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
    $(document).on('change', '#universitas_saintek1', function() {
        var universitas_kode = $(this).val();
        var jenis_program_studi = $('#saintek').val();
        // $("#jurusan_saintek1").select2();
        // $("#jurusan_saintek1").val(null).trigger("reset");
        // alert(jenis_program_studi);
        var div = $(this).parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('hasiltryoutsiswa/finduniversitas')!!}',
            data: {'kode':universitas_kode, 'jenis_program_studi':jenis_program_studi},
            success: function(data){
                // alert(data);
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].kode+'">'+data[i].nama+'</option>';
                }
                $('#jurusan_saintek1').html(" ");
                $('#jurusan_saintek1').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
    $(document).on('change', '#universitas_saintek2', function() {
        var universitas_kode = $(this).val();
        var jenis_program_studi = $('#saintek').val();
        // alert(jenis_program_studi);
        var div = $(this).parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('hasiltryoutsiswa/finduniversitas')!!}',
            data: {'kode':universitas_kode, 'jenis_program_studi':jenis_program_studi},
            success: function(data){
                // alert(data);
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].kode+'">'+data[i].nama+'</option>';
                }
                $('#jurusan_saintek2').html(" ");
                $('#jurusan_saintek2').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
    $(document).on('change', '#universitas_soshum1', function() {
        var universitas_kode = $(this).val();
        var jenis_program_studi = $('#soshum').val();
        // alert(jenis_program_studi);
        var div = $(this).parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('hasiltryoutsiswa/finduniversitas')!!}',
            data: {'kode':universitas_kode, 'jenis_program_studi':jenis_program_studi},
            success: function(data){
                // alert(data);
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].kode+'">'+data[i].nama+'</option>';
                }
                $('#jurusan_soshum1').html(" ");
                $('#jurusan_soshum1').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
    $(document).on('change', '#universitas_soshum2', function() {
        var universitas_kode = $(this).val();
        var jenis_program_studi = $('#soshum').val();
        // alert(jenis_program_studi);
        var div = $(this).parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('hasiltryoutsiswa/finduniversitas')!!}',
            data: {'kode':universitas_kode, 'jenis_program_studi':jenis_program_studi},
            success: function(data){
                // alert(data);
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].kode+'">'+data[i].nama+'</option>';
                }
                $('#jurusan_soshum2').html(" ");
                $('#jurusan_soshum2').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
});
</script>
@endsection