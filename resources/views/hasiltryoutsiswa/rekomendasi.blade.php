@extends('layouts.main-layout', ['page_title' => 'Rekomendasi Jurusan', 'breadcrumb' => ['Data Tryout Saya', 'Lihat Data Tryout', 'Rekomendasi Jurusan'],])

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
            </tr>
            </thead>
            <tbody>
            @foreach ($rekomendasis as $rekomendasi)
            <tr>
                <td>{{ $rekomendasi->nama_universitas }}</td>
                <td>{{ $rekomendasi->nama_jurusan }}</td>
                <td>{{ $rekomendasi->prioritas }}</td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Universitas</th>
                <th>Jurusan</th>
                <th>Prioritas</th>
              </tr>
            </tfoot>
          </table>
          <div class="card-tools">
            <hr>
            <a type="button" href="{{ route('hasiltryoutsiswa.show',$tryout->id) }}" class="btn btn-block btn-default pull-right" style="width: 10%;">Kembali</a>
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