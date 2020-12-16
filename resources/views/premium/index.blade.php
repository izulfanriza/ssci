@extends('layouts.main-layout', ['page_title' => 'Upgrade Premium', 'breadcrumb' => ['Upgrade Premium'],])

@section('content')

  <div class="row d-flex justify-content-center">
    <div class="col-7">
        <div class="card">
            <div class="card-header text-center">
                <h5>Upgrade Premium</h5>
            </div>
            <form method="POST" action="{{ route('upgrade.store') }}" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <div class="info-box shadow-none">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="card-body pt-0">
                                <p><b>Akun Premium</b><br>
                                    1. Simulasi Hitung UTBK tak terbatas. <br>
                                    2. Mendapatkan Rekomendasi Pilihan Jurusan berdasar nilai UTBK</p>
                                <p>Upgrade ke akun premium sekarang dengan melakukan pembayaran sejumlah Rp25.000,00 ke nomor rekening berikut :</p>
                                <table class="table table-sm table-borderless col-7">
                                    <tr>
                                        <td>BNI</td>
                                        <td>:</td>
                                        <td>1234567890</td>
                                    </tr>
                                    <tr>
                                        <td>BRI</td>
                                        <td>:</td>
                                        <td>1234567890</td>
                                    </tr>
                                    <tr>
                                        <td>Mandiri</td>
                                        <td>:</td>
                                        <td>1234567890</td>
                                    </tr>
                                </table>

                                <p class="mt-3">Atau upload kartu/identitas anda selaku siswa SSCIntersolusi.</p>
                                <p>Jika ada masalah hubungi +6281xxxxxxx</p>
                                
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="upgrade_premium" id="upgrade_premium" value="Upload" required>
                                        <label class="custom-file-label" for="upgrade_premium">Choose file</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col d-flex justify-content-center">
                        {{ csrf_field() }}
                        <button type="submit" style="width: 100px" class="btn btn-block btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>

  @endsection