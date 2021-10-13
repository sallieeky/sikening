<!DOCTYPE html>
<html lang="en">
<head>

     <title>Eatery Cafe and Restaurant Template</title>
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
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About</a></li>
                         <li><a href="#team" class="smoothScroll">Chef</a></li>
                         <li><a href="#menu" class="smoothScroll">Menu</a></li>
                         <li><a href="#contact" class="smoothScroll">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="https://wa.me/+6281241944616?text=Saya ingin bertanya" target="_blank">WhatsApp <i class="fa fa-phone"></i> 0812-4194-4616</a></li>
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
                              <span class="pull-right">Akan Berakhir {{ $waktu[$loop->iteration - 1] }}</span>
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
                              <h2>Our Menus</h2>
                              <h4>Tea Time &amp; Dining</h4>
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

                    {{-- <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset("landing_assets") }}/images/menu-image2.jpg" class="image-popup" title="Self-made Salad">
                                   <img src="{{ asset("landing_assets") }}/images/menu-image2.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Self-made Salad</h3>
                                             <p>Green / Fruits / Healthy</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$18</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset("landing_assets") }}/images/menu-image3.jpg" class="image-popup" title="Chinese Noodle">
                                   <img src="{{ asset("landing_assets") }}/images/menu-image3.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Chinese Noodle</h3>
                                             <p>Pepper / Chicken / Vegetables</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$34</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset("landing_assets") }}/images/menu-image4.jpg" class="image-popup" title="Rice Soup">
                                   <img src="{{ asset("landing_assets") }}/images/menu-image4.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Rice Soup</h3>
                                             <p>Green / Chicken</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$28</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset("landing_assets") }}/images/menu-image5.jpg" class="image-popup" title="Project title">
                                   <img src="{{ asset("landing_assets") }}/images/menu-image5.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Deli Burger</h3>
                                             <p>Beef / Fried Potatoes</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$46</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset("landing_assets") }}/images/menu-image6.jpg" class="image-popup" title="Project title">
                                   <img src="{{ asset("landing_assets") }}/images/menu-image6.jpg" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>Big Flat Fried</h3>
                                             <p>Pepper / Crispy</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>$30</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div> --}}
               </div>
          </div>
     </section>


     <!-- TESTIMONIAL -->
     <section id="testimonial" >
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Testimonials</h2>
                         </div>
                    </div>  

                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                         <div class="owl-carousel owl-theme">
                              <div class="item">
                                   <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas faucibus mollis interdum ullamcorper nulla non.</p>
                                        <div class="tst-author">
                                             <h4>Digital Carlson</h4>
                                             <span>Pharetra quam sit amet</span>
                                        </div>
                              </div>

                              <div class="item">
                                   <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed vestibulum orci quam.</p>
                                        <div class="tst-author">
                                             <h4>Johnny Stephen</h4>
                                             <span>Magna nisi porta ligula</span>
                                        </div>
                              </div>

                              <div class="item">
                                   <p>Vivamus aliquet felis eu diam ultricies congue. Morbi porta lorem nec consectetur porta quis dui elit habitant morbi.</p>
                                        <div class="tst-author">
                                             <h4>Jessie White</h4>
                                             <span>Vitae lacinia augue urna quis</span>
                                        </div>
                              </div>

                         </div>
                    </div>

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
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8085782997714!2d117.48241831457183!3d0.12661529990763434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320a0d8e825b4039%3A0x1fec45a70bf09813!2sBontang%2C%20Tanjung%20Laut%2C%20South%20Bontang%2C%20Bontang%20City%2C%20East%20Kalimantan%2075325!5e0!3m2!1sen!2sid!4v1632980477183!5m2!1sen!2sid" allowfullscreen></iframe>
                         </div>
                    </div>    

                    <div class="col-md-6 col-sm-12">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                   <h2>Contact Us</h2>
                              </div>
                         </div>

                         <!-- CONTACT FORM -->
                         <form action="/" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
                              @csrf
                              <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
                              <h6 class="text-success">Your message has been sent successfully.</h6>
                              <!-- IF MAIL NOT SENT -->
                              <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" id="cf-name" name="name" placeholder="Nama Lengkap" required>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" id="cf-email" name="email" placeholder="Alamat Email" required>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Subjek" required>
                                   <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Pesan yang ingin anda sampaikan" required></textarea>
                                   <button type="submit" class="form-control" style="background: #ffbd59" id="cf-submit" name="submit">Send Message</button>
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
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>123 nulla a cursus rhoncus,<br> augue sem viverra 10870<br>id ultricies sapien</p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>090-080-0650 | 090-070-0430</p>
                                   <p><a href="mailto:info@company.com">info@company.com</a></p>
                                   <p>LINE: eatery247 </p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                         <div class="footer-info footer-open-hour">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                              </div>
                              <div class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>Monday: Closed</p>
                                   <div>
                                        <strong>Tuesday to Friday</strong>
                                        <p>7:00 AM - 9:00 PM</p>
                                   </div>
                                   <div>
                                        <strong>Saturday - Sunday</strong>
                                        <p>11:00 AM - 10:00 PM</p>
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
                              <p><br>Copyright &copy; 2018 <br>Your Company Name 
                              
                              <br><br>Design: TemplateMo</p>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
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