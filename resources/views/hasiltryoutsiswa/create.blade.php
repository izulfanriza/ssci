@extends('layouts.main-layout', ['page_title' => 'Tambah Tryout Saya', 'breadcrumb' => ['Data Tryout Saya', 'Cari Data Tryout', 'Tambah Tryout Saya'],])

@section('custom_css')
@include('components.css.datatable')
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        @foreach ($tryout as $key => $tryout)
          <div class="card-header">
            <h3 class="card-title">Tabel Data Peserta Tryout - <b> Kode : {{ $tryout->kode }}</b>
                <br> {{ $tryout->nama }}
                <br> {{ 'TKA: '. $tryout->tanggal_indo_tka .' - ' .  $tryout->pukul_tka }}
                <br> {{ 'TPS: '. $tryout->tanggal_indo_tps .' - ' .  $tryout->pukul_tps }}</h3>
            <div class="card-tools">
            </div>
          </div>
        @endforeach
        <!-- /.card-header -->

        @foreach ($peserta as $key => $peserta)
        <form method="POST" action="{{ route('hasiltryoutsiswa.store') }}" class="form-horizontal">
          <div class="card-body">
              <div class="row">
                  <div class="col-sm-6" hidden>
                      <div class="form-group">
                          <label for="id">ID Peserta</label>
                          <input type="text" name="id" class="form-control" id="id" value="{{ old('id',$peserta->id) }}">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="nomor">Nomor Peserta</label>
                          <input type="text" name="nomor" class="form-control" id="nomor" value="{{ old('nomor',$peserta->nomor) }}" readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="nama">Nama Peserta</label>
                          <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama',$peserta->nama) }}" readonly>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="skor_tka">Skor TKA</label>
                          <input type="text" name="skor_tka" class="form-control" id="skor_tka" value="{{ old('skor_tka',$peserta->skor_tka) }}" readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="rank_tka">Rank TKA</label>
                          <input type="text" name="rank_tka" class="form-control" id="rank_tka" value="{{ old('rank_tka',$peserta->rank_tka) }}" readonly>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="nomor">Skor TPS</label>
                          <input type="text" name="nomor" class="form-control" id="nomor" value="{{ old('nomor',$peserta->nomor) }}" readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="rank_tps">Rank TPS</label>
                          <input type="text" name="rank_tps" class="form-control" id="rank_tps" value="{{ old('rank_tps',$peserta->rank_tps) }}" readonly>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <a type="button" href="{{ route('hasiltryoutsiswa.cari') }}" class="btn btn-default">Kembali</a>
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary float-right">Sinkronkan</button>
          </div>
      </form>
      @endforeach
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection

@section('custom_script')
@include('components.js.datatable')
@endsection