<!DOCTYPE html>
<html lang="en">
<head>

     <title>Cake Nining</title>
<!-- 

Eatery Cafe Template 

http://www.templatemo.com/tm-515-eatery

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     {{-- <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet"> --}}

     <style>

          @-webkit-keyframes notyf-fadeinup{0%{opacity:0;transform:translateY(25%)}to{opacity:1;transform:translateY(0)}}@keyframes notyf-fadeinup{0%{opacity:0;transform:translateY(25%)}to{opacity:1;transform:translateY(0)}}@-webkit-keyframes notyf-fadeinleft{0%{opacity:0;transform:translateX(25%)}to{opacity:1;transform:translateX(0)}}@keyframes notyf-fadeinleft{0%{opacity:0;transform:translateX(25%)}to{opacity:1;transform:translateX(0)}}@-webkit-keyframes notyf-fadeoutright{0%{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(25%)}}@keyframes notyf-fadeoutright{0%{opacity:1;transform:translateX(0)}to{opacity:0;transform:translateX(25%)}}@-webkit-keyframes notyf-fadeoutdown{0%{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(25%)}}@keyframes notyf-fadeoutdown{0%{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(25%)}}@-webkit-keyframes ripple{0%{transform:scale(0) translateY(-45%) translateX(13%)}to{transform:scale(1) translateY(-45%) translateX(13%)}}@keyframes ripple{0%{transform:scale(0) translateY(-45%) translateX(13%)}to{transform:scale(1) translateY(-45%) translateX(13%)}}.notyf{align-items:flex-end;box-sizing:border-box;color:#fff;display:flex;flex-direction:column;height:100%;justify-content:flex-end;left:0;padding:20px;pointer-events:none;position:fixed;top:0;width:100%;z-index:9999}.notyf__icon--error,.notyf__icon--success{background:#fff;border-radius:50%;display:block;height:21px;margin:0 auto;position:relative;width:21px}.notyf__icon--error:after,.notyf__icon--error:before{background:currentColor;border-radius:3px;content:"";display:block;height:12px;left:9px;position:absolute;top:5px;width:3px}.notyf__icon--error:after{transform:rotate(-45deg)}.notyf__icon--error:before{transform:rotate(45deg)}.notyf__icon--success:after,.notyf__icon--success:before{background:currentColor;border-radius:3px;content:"";display:block;position:absolute;width:3px}.notyf__icon--success:after{height:6px;left:6px;top:9px;transform:rotate(-45deg)}.notyf__icon--success:before{height:11px;left:10px;top:5px;transform:rotate(45deg)}.notyf__toast{-webkit-animation:notyf-fadeinup .3s ease-in forwards;animation:notyf-fadeinup .3s ease-in forwards;border-radius:2px;box-shadow:0 3px 7px 0 rgba(0,0,0,.25);box-sizing:border-box;display:block;flex-shrink:0;max-width:300px;overflow:hidden;padding:0 15px;pointer-events:auto;position:relative;transform:translateY(25%)}.notyf__toast--disappear{-webkit-animation:notyf-fadeoutdown .3s forwards;animation:notyf-fadeoutdown .3s forwards;-webkit-animation-delay:.25s;animation-delay:.25s;transform:translateY(0)}.notyf__toast--disappear .notyf__icon,.notyf__toast--disappear .notyf__message{-webkit-animation:notyf-fadeoutdown .3s forwards;animation:notyf-fadeoutdown .3s forwards;opacity:1;transform:translateY(0)}.notyf__toast--disappear .notyf__dismiss{-webkit-animation:notyf-fadeoutright .3s forwards;animation:notyf-fadeoutright .3s forwards;opacity:1;transform:translateX(0)}.notyf__toast--disappear .notyf__message{-webkit-animation-delay:.05s;animation-delay:.05s}.notyf__toast--upper{margin-bottom:20px}.notyf__toast--lower{margin-top:20px}.notyf__toast--dismissible .notyf__wrapper{padding-right:30px}.notyf__ripple{-webkit-animation:ripple .4s ease-out forwards;animation:ripple .4s ease-out forwards;border-radius:50%;height:400px;position:absolute;right:0;top:0;transform:scale(0) translateY(-51%) translateX(13%);transform-origin:bottom right;width:400px;z-index:5}.notyf__wrapper{align-items:center;border-radius:3px;display:flex;padding-bottom:17px;padding-right:15px;padding-top:17px;position:relative;z-index:10}.notyf__icon{-webkit-animation:notyf-fadeinup .3s forwards;animation:notyf-fadeinup .3s forwards;-webkit-animation-delay:.3s;animation-delay:.3s;font-size:1.3em;margin-right:13px;opacity:0;text-align:center;width:22px}.notyf__dismiss{-webkit-animation:notyf-fadeinleft .3s forwards;animation:notyf-fadeinleft .3s forwards;-webkit-animation-delay:.35s;animation-delay:.35s;height:100%;margin-right:-15px;opacity:0;position:absolute;right:0;top:0;width:26px}.notyf__dismiss-btn{background-color:rgba(0,0,0,.25);border:none;cursor:pointer;height:100%;opacity:.35;outline:none;transition:opacity .2s ease,background-color .2s ease;width:100%}.notyf__dismiss-btn:after,.notyf__dismiss-btn:before{background:#fff;border-radius:3px;content:"";height:12px;left:calc(50% - 1px);position:absolute;top:calc(50% - 5px);width:2px}.notyf__dismiss-btn:after{transform:rotate(-45deg)}.notyf__dismiss-btn:before{transform:rotate(45deg)}.notyf__dismiss-btn:hover{background-color:rgba(0,0,0,.15);opacity:.7}.notyf__dismiss-btn:active{opacity:.8}.notyf__message{-webkit-animation:notyf-fadeinup .3s forwards;animation:notyf-fadeinup .3s forwards;-webkit-animation-delay:.25s;animation-delay:.25s;line-height:1.5em;opacity:0;position:relative;vertical-align:middle}@media only screen and (max-width:480px){.notyf{padding:0}.notyf__ripple{-webkit-animation-duration:.5s;animation-duration:.5s;height:600px;width:600px}.notyf__toast{border-radius:0;box-shadow:0 -2px 7px 0 rgba(0,0,0,.13);max-width:none;width:100%}.notyf__dismiss{width:56px}}

     </style>


     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/font-awesome.min.css">
     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/animate.css">
     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/owl.carousel.css">
     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/owl.theme.default.min.css">
     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/magnific-popup.css">

     <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset("landing_assets") }}/css/templatemo-style.css">

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand">Cake <span>.</span> Nining</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">Beranda</a></li>
                         <li><a href="#about" class="smoothScroll">Tentang</a></li>
                         <li><a href="#team" class="smoothScroll">Promo</a></li>
                         <li><a href="#menu" class="smoothScroll">Menu</a></li>
                         <li><a href="#contact" class="smoothScroll">Kontak</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="https://wa.me/+6281241944616?text=Saya ingin bertanya" target="_blank">WhatsApp <i class="fa fa-phone"></i> +62 821-1364-3151</a></li>
                         <a href="/dashboard" class="section-btn">Dashboard</a>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">
            <div class="owl-carousel owl-theme">
                  <div class="item item-first">
                      <div class="caption">
                            <div class="container">
                                <div class="col-md-12 col-sm-12"">
                                      {{-- <h3>Eatery Cafe &amp; Restaurant</h3>
                                      <h1>Our mission is to provide an unforgettable experience</h1> --}}
                                      {{-- <a href="#team" class="section-btn btn btn-default smoothScroll">Meet our chef</a> --}}
                                </div>
                            </div>
                      </div>
                  </div>

                  <div class="item item-second">
                      <div class="caption">
                            <div class="container">
                                <div class="col-md-8 col-sm-12">
                                      {{-- <h3>Your Perfect Breakfast</h3>
                                      <h1>The best dinning quality can be here too!</h1>
                                      <a href="#menu" class="section-btn btn btn-default smoothScroll">Discover menu</a> --}}
                                </div>
                            </div>
                      </div>
                  </div>

                  <div class="item item-third">
                      <div class="caption">
                            <div class="container">
                                <div class="col-md-8 col-sm-12">
                                      {{-- <h3>New Restaurant in Town</h3>
                                      <h1>Enjoy our special menus every Sunday and Friday</h1>
                                      <a href="#contact" class="section-btn btn btn-default smoothScroll">Reservation</a> --}}
                                </div>
                            </div>
                      </div>
                  </div>
            </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                      <div class="about-info">
                          <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                <h4>Deskripsi</h4>
                                <h2>Cake Nining</h2>
                          </div>
                          <div class="wow fadeInUp" data-wow-delay="0.4s">
                                <p>{!! $deskripsi !!}</p>
                          </div>
                      </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="wow fadeInUp" data-wow-delay="0.6s">
                      <img src="{{ asset("assets/logo.png") }}" class="img-responsive" style="width:60%; margin: auto" alt="">
                  </div>
                </div>
              </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Promo dari Cake Nining</h2>
                              <h4>Jangan lewatkan promo dari kami</h4>
                         </div>
                    </div>

                    @if (count($promo) == 0)
                    <div class="col-md-12" style="margin-bottom: 12px;background-color: #ff8888; color:#202020; border: solid 3px #202020; border-radius: 5px ">
                         <a href="#" class="h5" style="width:100%; display:inline-block; padding: 5px; text-align: center">Belum ada promo yang ditawarkan oleh Cake Nining</a>
                    </div>
                    @endif

                    @foreach ($promo as $pr)
                    <div class="col-md-12" style="margin-bottom: 12px;background-color: #fefefe; color:#202020; border: solid 3px #202020; border-radius: 5px ">
                         <a href="#" class="h5" style="width:100%; display:inline-block; padding: 5px"><span class="pull-left">{{ $pr->value }}</span>
                              <span class="pull-right"><strong>Hingga</strong> {{ $waktu[$loop->iteration - 1] }}</span>
                         </a>
                    </div>
                    @endforeach
               </div>
          </div>
     </section>


     <!-- MENU-->
     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Menu Kami</h2>
                              <h4>Daftar menu terbaik kami</h4>
                         </div>
                    </div>
                    @foreach ($menu as $mn)
                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset("storage/menu/" . $mn->gambar) }}" class="image-popup" title="{{ $mn->nama }}">
                                   <img src="{{ asset("storage/menu/" . $mn->gambar) }}" style="height: 300px" class="img-responsive" alt="">
                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>{{ $mn->nama }}</h3>
                                             <p>{{ $mn->kategori }}</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>Rp. {{ number_format($mn->harga,2,",",".") }}</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>
                    @endforeach
               </div>
          </div>
     </section>

     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                    <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                         <div id="google-map">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6463921372524!2d117.52471421457196!3d0.5319075996119428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320a354a8f1242f7%3A0xad461bc280cc167c!2sJl.%20Yos%20Sudarso%20IV%2C%20Tlk.%20Lingga%2C%20Sangatta%20Utara%2C%20Kabupaten%20Kutai%20Timur%2C%20Kalimantan%20Timur!5e0!3m2!1sen!2sid!4v1635131617268!5m2!1sen!2sid" allowfullscreen></iframe>
                         </div>
                    </div>    

                    <div class="col-md-6 col-sm-12">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                   <h2>Kontak Kami</h2>
                              </div>
                         </div>

                         <!-- CONTACT FORM -->
                         <form action="/" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
                              @csrf
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" id="cf-name" name="name" placeholder="Nama Lengkap" required>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" id="cf-email" name="email" placeholder="Alamat Email" required>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Subjek" required>
                                   <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Pesan yang ingin anda sampaikan" required></textarea>
                                   <button type="submit" class="form-control" style="background: #ffbd59" id="cf-submit" name="submit">Kirim Pesan</button>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>          


     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Cari Kami</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>Jln yos sudarso 3.<br> Kel. Teluk lingga. Kec sangatta utara.<br> Kab kutai timur</p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Pemesanan</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>+62 821-1364-3151</p>
                                   <p><a href="mailto:sikening.a6@gmail.com">sikening.a6@gmail.com</a></p>
                                   {{-- <p>LINE: eatery247 </p> --}}
                              </address>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                         <div class="footer-info footer-open-hour">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Jam buka</h2>
                              </div>
                              <div class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>Buka Setiap Hari</p>
                                   <div>
                                        <strong>Senin sampai Minggu</strong>
                                        <p>7:00 - 22:00</p>
                                   </div>
                                   <div>
                                        <strong>Jum'at</strong>
                                        <p>7:00 - 11:00 dan 14:00 - 22:00</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4">
                         <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                              <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                              <li><a href="#" class="fa fa-twitter"></a></li>
                              <li><a href="#" class="fa fa-instagram"></a></li>
                              <li><a href="#" class="fa fa-google"></a></li>
                         </ul>

                         <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                              <p><br>Copyright &copy; 2021 <br>Cake Nining 
                              
                              <br><br>Design: TemplateMo</p>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>

     {{-- ALERT BERHASIL --}}
     @if (session("pesan"))
     <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
     @endif

     <!-- SCRIPTS -->
     <script>
     const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)
     </script>

     <script src="{{ asset("landing_assets") }}/js/jquery.js"></script>
     <script src="{{ asset("landing_assets") }}/js/bootstrap.min.js"></script>
     <script src="{{ asset("landing_assets") }}/js/jquery.stellar.min.js"></script>
     <script src="{{ asset("landing_assets") }}/js/wow.min.js"></script>
     <script src="{{ asset("landing_assets") }}/js/owl.carousel.min.js"></script>
     <script src="{{ asset("landing_assets") }}/js/jquery.magnific-popup.min.js"></script>
     <script src="{{ asset("landing_assets") }}/js/smoothscroll.js"></script>
     <script src="{{ asset("landing_assets") }}/js/custom.js"></script>

</body>
</html>