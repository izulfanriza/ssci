@extends('layouts.main-layout', ['page_title' => 'Profil', 'breadcrumb' => ['Profil'],])

@section('content')

<div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Profil {{ $user->name }}</h5>
        </div>

        <form method="POST" action="{{ route('profil.update', $user) }}" class="form-horizontal">
            <div class="card-body">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nama<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name',$user->name) }}" placeholder="Masukan Nama" required="required">
                            @error('name')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email',$user->email) }}" placeholder="Masukan Email" required="required">
                            @error('email')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="no_hp">No HP<span class="text-danger">*</span></label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp',$user->no_hp) }}" placeholder="Masukan No HP" required="required">
                            @error('no_hp')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <div>
                                @if ($user->role == 'admin')
                                    {{ 'Admin' }}
                                @endif
                                @if ($user->role == 'siswapremium')
                                    {{ 'Siswa Premium' }}
                                @endif
                                @if ($user->role == 'siswabiasa')
                                    {{ 'Siswa' }} &emsp; <a type="button" class="btn btn-success" href="{{ url('upgrade/') }}">Upgrade ke Siswa Premium</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat',$user->alamat) }}" placeholder="Masukan Alamat">
                            @error('alamat')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="alert-info p-2 rounded">
                    Jika akan mengganti password, silakan isi pada kolom Password dan ulangi di kolom Konfirmasi Password.
                    <br><i>Biarkan kosong jika tidak ingin mengganti password.</i>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                            @error('password')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Masukan Ulang Password">
                            @error('password-confirm')
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
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
      </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->

@endsection