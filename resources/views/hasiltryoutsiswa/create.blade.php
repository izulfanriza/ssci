@extends('layouts.main-layout', ['page_title' => 'Sinkronkan Tryout Saya', 'breadcrumb' => ['Data Tryout Saya','Sinkronkan Tryout Saya'],])

@section('content')

<div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>

          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's
            content.
          </p>

          <a href="{{ route('hasiltryoutsiswa.index') }}" class="card-link">Kembali</a>
          <a href="{{ route('hasiltryoutsiswa.index') }}" class="card-link">Kembali</a>
        </div>
      </div>

      <div class="card card-primary card-outline">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>

          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's
            content.
          </p>
          <a href="{{ route('hasiltryoutsiswa.index') }}" class="card-link">Kembali</a>
          <a href="{{ route('hasiltryoutsiswa.index') }}" class="card-link">Kembali</a>
        </div>
      </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h5 class="m-0">Featured</h5>
        </div>
        <div class="card-body">
          <h6 class="card-title">Special title treatment</h6>

          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="{{ route('hasiltryoutsiswa.index') }}" class="btn btn-default">Kembali</a>
        </div>
      </div>

      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Featured</h5>
        </div>
        <div class="card-body">
          <h6 class="card-title">Special title treatment</h6>

          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="{{ route('hasiltryoutsiswa.index') }}" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->

  @endsection