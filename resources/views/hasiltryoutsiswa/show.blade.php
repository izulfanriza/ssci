@extends('layouts.main-layout', ['page_title' => 'Lihat Data Tryout', 'breadcrumb' => ['Data Tryout Saya', 'Lihat Data Tryout'],])

@section('custom_css')
@include('components.css.datatable')
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
              <br> <b> Nomor Peserta : {{ $tryout->nomor_peserta }}</b>
              <br> <b> Nama Peserta : {{ $tryout->nama_peserta }}</b>
              <br> Skor TKA : {{ $tryout->skor_tka .' - Rank TKA : ' .  $tryout->rank_tka }}
              <br> SKOR TPS : {{ $tryout->skor_tps .' - Rank TPS : ' .  $tryout->rank_tps }}</h3>
          <div class="card-tools">
            <a type="button" href="{{ route('hasiltryoutsiswa.addsimulasi', $tryout->id_peserta) }}" class="btn btn-block btn-success">Tambah Simulasi</a>
          </div>
        @endforeach
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Prioritas</th>
                <th style="width: 20%">Hasil</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($simulasis as $simulasi)
            <tr>
                <td>{{ $simulasi->nama_universitas }}</td>
                <td>{{ $simulasi->nama_jurusan }}</td>
                <td>{{ $simulasi->pilihan }}</td>
                <td>
                  @if ($simulasi->hasil == 'lolos')<span class="badge bg-success">Lolos</span>@endif
                  @if($simulasi->hasil == 'tidaklolos')
                    <span class="badge bg-danger">Tidak Lolos</span> &nbsp;
                    <a href="{{ route('hasiltryoutsiswa.rekomendasi', $simulasi->id) }}">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-info">Lihat Rekomendasi</button>
                      </div>
                    </a>
                  @endif
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Prioritas</th>
                <th>Hasil</th>
              </tr>
            </tfoot>
          </table>
          <div class="card-tools">
            <hr>
            <a type="button" href="{{ route('hasiltryoutsiswa.index') }}" class="btn btn-block btn-default pull-right" style="width: 10%;">Kembali</a>
          </div>
        </div>
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