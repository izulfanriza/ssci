@extends('layouts.main-layout', ['page_title' => 'Detail Simulasi', 'breadcrumb' => ['Simulasi', 'Detail Simulasi'],])

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header text-center">
              <div class="row align-items-center">
                  <div class="col">
                      <h5>Hasil Perhitungan - SAINTEK</h5>
                  </div>
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="row">
                  <div class="col">
                      <div class="card">
                          <div class="card-body p-0">
                            <table class="table table-md">
                              <tbody>
                                <tr>
                                  <td>1.</td>
                                  <td>Matematika</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>2.</td>
                                  <td>Fisika</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>3.</td>
                                  <td>Kimia</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>4.</td>
                                  <td>Biologi</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>5.</td>
                                  <td>K. Penalaran Umum</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>6.</td>
                                  <td>M. Bacaan & Menulis</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>7.</td>
                                  <td>Peng. & Pemahaman Umum</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                                <tr>
                                  <td>8.</td>
                                  <td>K. Kuantitatif</td>
                                  <td><span class="badge bg-info">400</span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                  </div>
  
                  <div class="col">
                      <!-- small box -->
                      <div class="small-box bg-success">
                      <div class="inner">
                          <h3>Pilihan 1</h3>
              
                          <p>Universitas</p>
                          <p>Jurusan</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-checkmark-circled"></i>
                      </div>
                      </div>
  
                      <!-- small box -->
                      <div class="small-box bg-danger">
                      <div class="inner">
                          <h3>Pilihan 2</h3>
              
                          <p>Universitas</p>
                          <p>Jurusan</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-close-circled"></i>
                      </div>
                      </div>
  
                  </div>
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      
      <div class="col-12">
          <div class="card">
              <div class="card-header text-center">
                  <div class="row align-items-center">
                      <div class="col">
                          <h5>Rekomendasi Jurusan</h5>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col">
                          <h6 class="font-weight-bold text-center">Pilihan Jurusan 1</h6>
                          <div class="card card-solid">
                              <div class="card-body p-3">
                                  <div class="card bg-light">
                                      <div class="card-header text-muted text-center border-bottom-0">
                                          Tidak ada rekomendasi
                                        </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <h6 class="font-weight-bold text-center">Pilihan Jurusan 2</h6>
                          <div class="card card-solid">
                              <div class="card-body">
                                  <div class="card bg-light p-3">
                                      <h2 class="lead"><i class="fas fa-lg fa-dot-circle"></i> Jurusan</h2>
                                      <h2 class="lead"><i class="fas fa-lg fa-university"></i> Universitas</h2>
                                      <div class="callout callout-success">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="card card-solid">
                              <div class="card-body">
                                  <div class="card bg-light p-3">
                                      <h2 class="lead"><i class="fas fa-lg fa-dot-circle"></i> Jurusan</h2>
                                      <h2 class="lead"><i class="fas fa-lg fa-university"></i> Universitas</h2>
                                      <div class="callout callout-success">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="card card-solid">
                              <div class="card-body">
                                  <div class="card bg-light p-3">
                                      <h2 class="lead"><i class="fas fa-lg fa-dot-circle"></i> Jurusan</h2>
                                      <h2 class="lead"><i class="fas fa-lg fa-university"></i> Universitas</h2>
                                      <div class="callout callout-success">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer">
                  <div class="col d-flex justify-content-center">
                      <a href="{{ route('simulasi.index') }}"><button type="button" style="width: 200px" class="btn btn-block btn-default">Kembali</button></a>
                  </div>
              </div>
          </div>
      </div>
</div>
  <!-- /.row -->

  @endsection