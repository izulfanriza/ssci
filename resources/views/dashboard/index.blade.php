@extends('layouts.main-layout', ['page_title' => 'Dashboard', 'breadcrumb' => ['Dashboard'],])

@section('content')

<div class="row">
  @if(Auth::user()->role=='admin')
    <div class="col-lg-12">
      <div class="alert-info p-2 rounded">
        Selamat Datang Admin, di Aplikasi SSCIntersolusi!
      </div>
    </div>
  @endif

  @if(Auth::user()->role=='siswapremium')
    <div class="col-lg-12">
      <div class="alert-info p-2 rounded">
        Selamat Datang Siswa Premium, di Aplikasi SSCIntersolusi!
      </div>
    </div>
  @endif
    
  @if(Auth::user()->role=='siswabiasa')
    <div class="col-lg-12">
      <div class="alert-info p-2 rounded">
        Selamat Datang Siswa, di Aplikasi SSCIntersolusi!
      </div>
    </div>
  @endif

</div>
<!-- /.row -->

@endsection