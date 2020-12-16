@extends('layouts.main-layout', ['page_title' => 'Edit User', 'breadcrumb' => ['User', 'Edit User'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data User</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('user.update', $user) }}" class="form-horizontal">
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
                            <label for="role">Role<span class="text-danger">*</span></label>
                            <select class="form-control" type="select" name="role" value="{{ old('role') }}">
                                <option disabled selected>--Pilih Role--</option>
                                <option value="admin" <?php echo old('role',$user->role) == 'admin' ? 'selected' : '' ;?>>Admin</option>
                                <option value="siswapremium" <?php echo old('role',$user->role) == 'siswapremium' ? 'selected' : '' ;?>>Siswa Premium</option>
                                <option value="siswabiasa" <?php echo old('role',$user->role) == 'siswabiasa' ? 'selected' : '' ;?>>Siswa Biasa</option>
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
                <a type="button" href="{{ route('user.index') }}" class="btn btn-default">Kembali</a>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection