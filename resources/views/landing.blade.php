<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SSCIntersolusi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('landing/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('landing/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-50"><a href="index.html">SSCIntersolusi</a></div>

          <div>
            <nav class="site-navigation position-relative text-right" role="navigation">
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                  <li>
                    <div class="form-group-sm mb-1 mt-1">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" style="border-radius: 40px; height: 42px;" placeholder="Email Addresss" required="required">
                      @error('email')
                          <span class="error">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </li>
                  <li>
                    <div class="form-group-sm">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" style="border-radius: 40px; height: 42px;" placeholder="Password" required="required">
                    </div>
                  </li>
                  <li class="cta"><button class="btn btn-primary btn-pill mt-0 pt-2" type="submit" style="border-radius: 40px; height: 42px;"> Masuk</button></li>
                </ul>
            </form>
            </nav>
          </div>

          <div class="ml-auto">
            <div class="cta">
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span>Masuk</span></a>
            </div>
          </div>

        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('{{asset('landing/images/hero_1.jpg')}}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row mr-2" style="padding-top: 8rem;">
            <div class="col">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Tentukan Masa Depanmu</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Analisa hasil Tryout UTBK-mu dan tentukan pilihanmu, semuanya ada ditanganmu. Coba sekarang juga!</p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="{{ route('register') }}" method="POST" class="form-box">
                    @csrf
                    <h3 class="h4 text-black mb-4">Buat Akun Baru</h3>
                    <div class="form-group">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Lengkap">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
                    </div>
                    <div class="form-group">
                      <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus placeholder="No HP">
                      @error('no_hp')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus placeholder="Alamat Rumah">
                      @error('alamat')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary btn-pill">
                        {{ __('Daftar') }}
                      </button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
     
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>Tentang Sistem TA</h3>
            <p>Sistem ini digunakan untuk menganalisa hasil Tryout UTBK para siswa dan memberikan berbagai rekomendasi pilihan Jurusan dan Universitas sesuai analisa nilai dari sistem ini.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#">SSCI</a></li>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twiter</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Kontak</h3>
            <p>Ingin menghubungi kami?</p>
            <p>Alamat : Yogyakarta</p>
            <p>Email : example@gmail.com</p>
            <p>Telepon : 0274 xxxx</p>
          </div>

        </div>

      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->

  <script src="{{asset('landing/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('landing/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('landing/js/jquery-ui.js')}}"></script>
  <script src="{{asset('landing/js/popper.min.js')}}"></script>
  <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('landing/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('landing/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('landing/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('landing/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('landing/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('landing/js/aos.js')}}"></script>
  <script src="{{asset('landing/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('landing/js/jquery.sticky.js')}}"></script>

  
  <script src="{{asset('landing/js/main.js')}}"></script>

  <script type="text/javascript"> 
    $(document).ready(function() { 
        $('input[type="checkbox"]').click(function() { 
            var inputValue = $(this).attr("value"); 
            $("." + inputValue).toggle(); 
        }); 
    }); 
</script> 
    
  </body>
</html>