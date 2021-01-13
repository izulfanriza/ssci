@extends('layouts.main-layout', ['page_title' => 'Buat Simulasi', 'breadcrumb' => ['Simulasi','Buat Simulasi'],])

@section('content')

<div class="row">
    
      <div class="col-lg-12">
        <div class="alert-warning p-2 rounded">
          Simulasi anda sudah mencapai jumlah maksimal silahkan upgrade ke akun premium, <a href="{{ url('/upgrade') }}">klik disini</a>
        </div>
      </div>
  
</div>

@endsection