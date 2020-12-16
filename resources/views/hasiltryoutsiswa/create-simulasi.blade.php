@extends('layouts.main-layout', ['page_title' => 'Tambah Simulasi', 'breadcrumb' => ['Data Tryout Saya', 'Lihat Data Tryout', 'Tambah Simulasi'],])

@section('custom_css')
@include('components.css.select2')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        @foreach ($tryout as $key => $tryout)
          <h3 class="card-title"><b> Kode : {{ $tryout->kode }}</b>
              <br> <b> Tryout : {{ $tryout->nama }}</b>
              <br> TKA : {{ $tryout->tanggal_indo_tka .' - ' .  $tryout->pukul_tka }}
              <br> TPS : {{ $tryout->tanggal_indo_tps .' - ' .  $tryout->pukul_tps }}
              <br>
        @endforeach
              <br> <b> Nomor Peserta : {{ $peserta->nomor }}</b>
              <br> <b> Nama Peserta : {{ $peserta->nama }}</b>
              <br> Skor TKA : {{ $peserta->skor_tka .' - Rank TKA : ' .  $peserta->rank_tka }}
              <br> SKOR TPS : {{ $peserta->skor_tps .' - Rank TPS : ' .  $peserta->rank_tps }}</h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{ route('hasiltryoutsiswa.savesimulasi') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" hidden>
                            <label for="id_tryout">ID Tryout</label>
                            <input type="text" name="id_tryout" class="form-control" id="id_tryout" value="{{ old('id_tryout',$tryout->id) }}">
                        </div>
                        <div class="form-group" hidden>
                            <label for="id_peserta">ID Peserta</label>
                            <input type="text" name="id_peserta" class="form-control" id="id_peserta" value="{{ old('id_peserta',$peserta->id) }}">
                        </div>
                        <div class="form-group" hidden>
                            <label for="jenis_program_studi">Jenis Program Studi</label>
                            <input type="text" name="jenis_program_studi" class="form-control" id="jenis_program_studi" value="{{ old('jenis_program_studi',$tryout->jenis) }}">
                        </div>
                        <div class="form-group">
                            <label for="universitas">Universitas<span class="text-danger">*</span></label>
                            <select name="universitas" id="universitas" class="form-control select2 required">
                                <option selected disabled>--Pilih Universitas--</option>
                                <?php foreach($universitas as $key => $universitas): ?>
                                    <option value="<?php echo $universitas->kode;?>"><?php echo $universitas->nama;?></option> 
                                <?php EndForeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jurusan">Jurusan<span class="text-danger">*</span></label>
                            <select name="jurusan" id="jurusan" class="form-control select2 required">
                                <option disabled selected>--Pilih Jurusan--</option>
                            </select>
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

                <div class="form-group mb-0"></div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a type="button" href="{{ route('hasiltryoutsiswa.show',$tryout->id) }}" class="btn btn-default">Kembali</a>
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