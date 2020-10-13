@extends('layouts.main-layout', ['page_title' => 'Tambah User', 'breadcrumb' => ['User', 'Tambah User'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data User</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('user.store') }}" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nama<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Masukan Nama" required="required">
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
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Masukan Email" required="required">
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
                            <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp') }}" placeholder="Masukan No HP" required="required">
                            @error('no_hp')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="role">Role<span class="text-danger">*</span></label>
                            <select class="form-control" type="select" name="role" value="{{ old('role') }}">
                                <option disabled selected>--Pilih Role--</option>
                                <option value="admin" <?php echo old('role') == 'admin' ? 'selected' : '' ;?>>Admin</option>
                                <option value="siswapremieum" <?php echo old('role') == 'siswapremieum' ? 'selected' : '' ;?>>Siswa Premium</option>
                                <option value="siswabiasa" <?php echo old('role') == 'siswabiasa' ? 'selected' : '' ;?>>Siswa Biasa</option>
                            </select>
                            @error('role')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" placeholder="Masukan Alamat">
                            @error('alamat')
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
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required="required">
                            @error('password')
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Masukan Ulang Password" required="required">
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
                <a type="button" href="{{ route('user.index') }}" class="btn btn-default">Kembali</a>
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