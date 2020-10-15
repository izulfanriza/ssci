@extends('layouts.main-layout', ['page_title' => 'Upload Peserta Tryout', 'breadcrumb' => ['Tryout', 'Peserta', 'Upload'],])

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Upload Data Peserta Tryout {{ $tryout->nama }}</h3>
        </div>
        <!-- /.card-header -->
        
        <form method="POST" action="{{ route('peserta.goupload') }}" class="form-horizontal" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6" hidden>
                        <div class="form-group">
                            <label for="id">ID Tryout<span class="text-danger">*</span></label>
                            <input type="text" name="id" class="form-control" id="id" value="{{ old('id',$tryout->id) }}" required="required" hidden>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="file_peserta">Pilih File Data Peserta<span class="text-danger">*</span></label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="file_peserta" class="custom-file-input" id="file_peserta" value="upload">
                                <label class="custom-file-label">Pilih file...</label>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0"></div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a type="button" href="{{ url('tryout/'.$tryout->id) }}" class="btn btn-default">Kembali</a>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary float-right">Upload</button>
            </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.row -->

@endsection

@section('custom_script')
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection