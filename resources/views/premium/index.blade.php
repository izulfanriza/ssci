@extends('layouts.main-layout', ['page_title' => 'Upgrade Premium', 'breadcrumb' => ['Upgrade Premium'],])

@section('content')

  <div class="row d-flex justify-content-center">
    <div class="col-7">
        <div class="card">
            <div class="card-header text-center">
                <h5>Upgrade Premium</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="info-box shadow-none">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-star"></i></span>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="card-body pt-0">
                            <p>Upgrade ke akun premium untuk mendapatkan rekomendasi pilihan jurusan berdasar nilai UTBK anda sekarang!!</p>
                            <p>Lakukan pembayaran sejumlah Rp25.000,00 ke nomor rekening berikut :</p>
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
                            <p class="mt-3">Upload bukti pembayaran berupa foto struk pembayaran dibawah ini dan akan diproses selama 1x24jam.</p>
                            <p>Jika ada masalah hubungi +6281xxxxxxxxx</p>
                            <form>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col d-flex justify-content-center">
                    <a href="#"><button type="button" style="width: 100px" class="btn btn-block btn-info">Kirim</button></a>
                </div>
            </div>
        </div>
    </div>
    
</div>

  @endsection