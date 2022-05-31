<!DOCTYPE HTML>
  <html>
    <head>
    <style>
    body {
	color: rgb(242, 241, 247);
	background: #0a18d4;
	font-family: 'Roboto', sans-serif;
}
.form-control, .form-control:focus, .input-group-addon {
	border-color: #fdfafa;
	border-radius: 0;
}
.signup-form {
	width: 340px;
	margin: 0 auto;
	padding: 20px 0;
}
.signup-form h2 {
	color: #f1f2f5;
	margin: 0 0 15px;
	text-align: center;
}
.signup-form .lead {
	font-size: 14px;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	border-radius: 1px;
	margin-bottom: 15px;
    background: rgba(255, 255, 255, 0.425);
	border: none;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
    opacity: 0.9;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 14px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
	border-width: 0 0 1px 0;
}
.signup-form .input-group-addon {
	max-width: 60px;
	text-align: center;
	background:  #fdfdfd;
	border-bottom: 1px solid #08db12;
	padding-left: 5px;
}
.signup-form .btn, .signup-form .btn:active {
	font-size: 20px;
	font-weight: bold;
	background: #250ef3 !important;
	border-radius: 1px;
	border: none;
	min-width: 120px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #1cc506e8 !important;
}
.signup-form a {
	color: #f9fdf9;
	text-decoration: none;
}
.signup-form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
	position: relative;
	top: 4px;
}
.signup-form .fa-paper-plane {
    font-size: 17px;
    color: rgb(10, 10, 9);
}
.signup-form .fa-lock {
    font-size: 20px;
    color: rgb(10, 10, 9);

}

.signup-form .fa-check {
	color: rgb(245, 250, 246);
	left: 10px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}

.form-check-label{
    color: rgb(8, 8, 4);
}

    </style>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Bright Aqua </title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

      <link rel="stylesheet" href="{{asset('Landingpage/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/css/animate.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/css/aos.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/css/bootstrap-datepicker.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/css/jquery.timepicker.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/css/fancybox.min.css')}}">

      <link rel="stylesheet" href="{{asset('Landingpage/fonts/ionicons/css/ionicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('Landingpage/fonts/fontawesome/css/font-awesome.min.css')}}">

      <!-- Theme Style -->
      <link rel="stylesheet" href="{{asset('Landingpage/css/style.css')}}">


      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200">

    <!-------------------------------------------------------------------->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
          <div class="text-center">
            <a href="{{ url('/my_register') }}" class="btn btn-success">Register as a Customer</a><br><br>
            <a href="{{ url('/register_supplier') }}" class="btn btn-warning">Register as a Supplier</a>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-success">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
    <!-------------------------------------------------------------------->

    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="templateux-navbar">
      <div class="container">
        <!-- <a class="navbar-brand" href="index.html"><span class="">Bright</span>Aqua</a><br /> -->


        <div class="site-menu-toggle js-site-menu-toggle  ml-auto"  data-aos="fade" data-toggle="collapse" data-target="#templateux-navbar-nav" aria-controls="templateux-navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span>
                
              </span>
            </div>
            <!-- END menu-toggle -->

        <div class="collapse navbar-collapse" id="templateux-navbar-nav">
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-team">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-rooms">Accessories</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-fish">Aquarium Fish</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-events">Ponds</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-contact">Contact Us</a></li> -->
            <li><button class=" btn btn-success btn-sm"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Register</button></li>
            <li><a class="nav-link" href="#"></a></li>
            &nbsp; &nbsp;&nbsp; 
            <li><a class="nav-link" href="#"></a></li>
            <li><a class="nav-link" href="#"></a></li>
            <li><a class="nav-link" href="#"></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

      <!--BACKGROUND IMAGE-->
      <section class="site-hero overlay" style="background-image: url(Landingpage/images/test4.jpg)" data-stellar-background-ratio="0.5" id="section-home">
        <div class="container">
          <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center" data-aos="fade-up">
           
      
              <div class="col-md-9 col-lg-4 col-sm-2 pull-right">
                <div class="container">
                  <!--Login form starts-->
                  <div class="signup-form">
                      <form action="{{ route('login') }}" method="POST">
                          @csrf
                          <h2>Login</h2>
                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autocomplete="email">
                                  @error('email')
                                      <span class="invalid-feedback" role="alert" style="color:rgb(228, 250, 31)">
                                           <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="input-group">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                      <label class="form-check-label" for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">

                              <button type="submit" class="btn btn-success btn-block btn-lg ">{{ __('Login') }}</button>

                          </div>
                          @if (Route::has('password.request'))
                          <div class="text-center">
                          <a class="text-dark" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                          </a>
                      </div>
                      <div class="text-center">
                      <a class="text-dark" href="{{url('/my_register') }}">
                          {{ __('Create an account?Sign up') }}
                      </a>
                  </div>
                      @endif
                      </form>
                  </div>
              </div>

                  <!--Login form ends-->


                </div>
              </div>
            </div>
          </div>





      </section>
      <!-- END section -->


      <section class="py-5 bg-light" id="section-about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
              <img src="Landingpage/images/aa.jpg" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
              <h2 class="heading mb-4">Hey there!</h2>
              <p class="mb-5">On this web site you can shop online for premium quality pet fish. Order and they'll be delivered to your front door.

Throughout this web site there are links to more information about aquariums and pet fish on our website at Bright Aqua.com.

Click here to go to Bright Aqua.com now.</p>
              <p><a href="##" class="btn btn-info text-white text-uppercase letter-spacing-1">Bright Aqua</a></p>
            </div>
          </div>
        </div>
      </section>

      <div class="container section" id="section-team">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7 mb-5">
          <h2 class="heading" data-aos="fade-up">All in one place</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(Landingpage/images/pond.jpg);">
                <div class="box">
                  <h2>Outsourcing ponds</h2>
                  <p>xxxx</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p><u>Outsourcing ponds</u><br>&ldquo;Freshwater fish ponds differ according to their source of water, the way in which water can be drained from the pond, the material and method used for construction and the method of use for fish farming. Their characteristics are usually defined by the features of the landscape in which they are built. Ponds can be described as follows. &rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                <a class="btn btn-success" href="##">Request</a>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="block-2"> <!-- .hover -->
            <div class="flipper">
              <div class="front" style="background-image: url(Landingpage/images/home.jpg);">
                <div class="box">
                  <h2>Home deliver</h2>
                  <p>xxxxx</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p><u>Home deliver</u><br>&ldquo;Your involvement:

You choose a product from their website.
You pay for it online and decide the delivery speed (1D/2D/4D)
They confirm your order and give you a tentative date and time by which the product will be delivered to you.

Their involvement:

They pick out the product from their inventory and decide on the quickest route to your place.

&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                <a class="btn btn-success" href="##">Request</a>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(Landingpage/images/repair.jpg);">
                <div class="box">
                  <h2>Aquarium repair</h2>
                  <p>xxxxx</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p><u>Aquarium repair</u><br>&ldquo;We offer Maintenance and cleaning service for your aquarium
we do professional aquarium service for freshwater and saltwater and planted aquarium for any size and shape aquarium For Srilanka region only&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                <a class="btn btn-success" href="##">Request</a>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>


        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(Landingpage/images/problemsolver.jpg);">
                <div class="box">
                  <h2>Online aquarium problems solving</h2>
                  <p>xxxx</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p><u>Online aquarium problems solving</u><br>&ldquo;Maintaining good water quality in your aquarium is one of the most important maintenance task you can do to protect the health and well-being of your fish. &rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="align-self-center">
                    <a class="btn btn-success" href="##">Request</a>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="block-2"> <!-- .hover -->
            <div class="flipper">
              <div class="front" style="background-image: url(Landingpage/images/medi.jpg);">
                <div class="box">
                  <h2>Medicines supply</h2>
                  <p>xxxx</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p><u>Medicines supply</u><br>&ldquo;Treating a sick aquarium fish can be hard, especially if you’re a new fish keeper and don’t recognize the disease. Even if you can identify that your pet fish has fin rot, cotton fin fungus, or white spot disease, it’s hard to tell what is the best fish medicine that will treat that particular fish disease. &rdquo;</p>
                </blockquote>
                <div class="author d-flex">

                  <a class="btn btn-success" href="##">Request</a>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(Landingpage/images/aware.jpg);">
                <div class="box">
                  <h2>Daily articles for your awareness</h2>
                  <p>xxxx</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                <p><u>Daily articles for your awareness</u><br>&ldquo;If you want to maintain a healthy, thriving aquarium you must be sure to set up your tank properly the first time. The articles in this category will help you set up your tank correctly.  &rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                <a class="btn btn-success" href="##">Request</a>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

      </div>
    </div>
    <!-- END .block-2 -->

      <section class="section" id="section-rooms">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">Aquarium Accessories</h2>
              <p data-aos="fade-up" data-aos-delay="100">We Import & distribute all kinds of aquarium accessories. we have categories
              of accessories. Filter systems,Fish tanks, stones and etc.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="Landingpage/images/aquapump.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Aquarium Air pump</h2>
                  <span class="text-uppercase letter-spacing-1">LKR.700.00</span>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="Landingpage/images/filters.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Aquarium sponge filter</h2>
                  <span class="text-uppercase letter-spacing-1">LKR.1200.00</span>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="Landingpage/images/valeves.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Metal air-valves</h2>
                  <span class="text-uppercase letter-spacing-1">LKR.750.00</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>


      <section class="section slider-section bg-light">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">Photos</h2>
              <p data-aos="fade-up" data-aos-delay="100">These are few popular categories of fish</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="slider-item">
                  <a href="Landingpage/images/slider-1.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-1.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
                <div class="slider-item">
                  <a href="Landingpage/images/slider-2.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-2.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
                <div class="slider-item">
                  <a href="Landingpage/images/slider-3.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-3.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
                <div class="slider-item">
                  <a href="Landingpage/images/slider-4.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-4.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
                <div class="slider-item">
                  <a href="Landingpage/images/slider-5.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-5.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
                <div class="slider-item">
                  <a href="Landingpage/images/slider-6.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-6.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
                <div class="slider-item">
                  <a href="Landingpage/images/slider-7.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="Landingpage/images/slider-7.jpg" alt="Image placeholder" class="img-fluid"></a>
                </div>
              </div>
              <!-- END slider -->
            </div>

          </div>
        </div>
      </section>
      <!-- END section -->


<!--THIS SECTION IS FOR AQUA FISH-->
      <section class="section" id="section-fish">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">Aquarium Fish</h2>
              <p data-aos="fade-up" data-aos-delay="100">We Import & distribute all kinds of aquarium accessories. we have categories
              of accessories. Filter systems,Fish tanks, stones and etc.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">

                 <img src="Landingpage/images/44.jpg" id="border" alt="Free website template" class="img-fluid mb-3">

                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Coral Beauty Angelfish</h2>
                  <span class="text-uppercase letter-spacing-1">LKR.70.00</span>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="Landingpage/images/clown.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Misbar Ocellaris Clownfish</h2>
                  <span class="text-uppercase letter-spacing-1">LKR.120.00</span>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="Landingpage/images/fish7.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Orange Butterflyfish</h2>
                  <span class="text-uppercase letter-spacing-1">LKR.50.00</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>





      <!-- END section -->
      <section class="section testimonial-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">People Says</h2>
            </div>
          </div>
          <div class="row">
            <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="Landingpage/images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>

                  <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; Jean Smith</em></p>
              </div>

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="Landingpage/images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; John Doe</em></p>
              </div>

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="Landingpage/images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>

                  <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; John Doe</em></p>
              </div>


              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="Landingpage/images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>

                  <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; Jean Smith</em></p>
              </div>

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="Landingpage/images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>
                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; John Doe</em></p>
              </div>

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="Landingpage/images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>

                  <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; John Doe</em></p>
              </div>

            </div>
              <!-- END slider -->
          </div>

        </div>
      </section>


      <section class="section blog-post-entry bg-light" id="section-events">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">Ponds</h2>
              <p data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ante felis, luctus vitae nisi in, hendrerit maximus est. Sed ut orci risus. Sed sit amet enim vitae ante porta consequat eget eget arcu.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

              <div class="media media-custom d-block mb-4 h-100">
                <a href="#" class="mb-4 d-block"><img src="{{url('Landingpage/images/5.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <span class="meta-post">February 26, 2018</span>
                  <h2 class="mt-0 mb-3"><a href="#">Few works</a></h2>
                  <p>Length : <br>
                     Raw materials needed : <br>
                     Area : <br>
                     Aquarium plants Used :<br>
                     Aquarium fish :<br></p>
                </div>
              </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="200">
              <div class="media media-custom d-block mb-4 h-100">
                <a href="#" class="mb-4 d-block"><img src="{{url('Landingpage/images/2.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <span class="meta-post">February 26, 2018</span>
                  <h2 class="mt-0 mb-3"><a href="#">Blend with the nature</a></h2>
                  <p>Length : <br>
                     Raw materials needed : <br>
                     Area : <br>
                     Aquarium plants Used :<br>
                     Aquarium fish :</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="300">
              <div class="media media-custom d-block mb-4 h-100">
                <a href="#" class="mb-4 d-block"><img src="{{url('Landingpage/images/3.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <span class="meta-post">February 26, 2018</span>
                  <h2 class="mt-0 mb-3"><a href="#">Living with nature from home</a></h2>
                  <p>Length : <br>
                     Raw materials needed : <br>
                     Area : <br>
                     Aquarium plants Used :<br>
                     Aquarium fish :</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section contact-section" id="section-contact">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">Contact Us</h2>
              <p data-aos="fade-up">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt porttitor sodales. Nunc efficitur velit quis nulla varius, in faucibus felis varius. Maecenas tellus enim, ornare quis placerat sed, rutrum non velit.</p>
            </div>
          </div>
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">

            <form method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control ">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control ">
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <textarea name="message" name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary text-white font-weight-bold">
                  <div class="submitting"></div>
                </div>
              </div>


            </form>



          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span class="text-black"> 231, <br>New Galle Road,Egodauyana, Moratuwa</span></p>
                <p><span class="d-block">Phone:</span> <span class="text-black"> (+94) 112 659 659</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> brightaqua@gmail.com</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <section class="section bg-image overlay" style="background-image: url('Landingpage/images/k.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">A Best Place To buy all in one place</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <!-- Extra large modal -->
              <a href="#" class="btn btn-outline-white-primary py-3 text-white px-5" data-toggle="modal" data-target="#reservation-form">Register now</a>
            </div>
          </div>
        </div>
      </section>

      <footer class="section footer-section">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
               <li><a href="#">Rooms</a></li>
              </ul>
            </div>
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><a href="#">The Rooms &amp; Suites</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Restaurant</a></li>
              </ul>
            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
              <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
              <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
              <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
              <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@yourdomain.com</span></p>
            </div>
            <div class="col-md-3 mb-5">
              <p>Sign up for our newsletter</p>
              <form action="#" class="footer-newsletter">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email...">
                  <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
                </div>
              </form>
            </div>
          </div>
          <div class="row pt-5">
            <p class="col-md-8 text-left">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart text-primary" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>

            <p class="col-md-4 text-right social">
              <a href="#"><span class="fa fa-tripadvisor"></span></a>
              <a href="#"><span class="fa fa-facebook"></span></a>
              <a href="#"><span class="fa fa-twitter"></span></a>
              <a href="#"><span class="fa fa-linkedin"></span></a>
              <a href="#"><span class="fa fa-vimeo"></span></a>
            </p>
          </div>
        </div>
      </footer>


      <!-- Modal -->
      <div class="modal fade " id="reservation-form" tabindex="-1" role="dialog" aria-labelledby="reservationFormTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">

                  <form action="index.html"  method="post" class="bg-white p-4">
                    <div class="row mb-4"><div class="col-12"><h2>Reservation</h2></div></div>
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label class="text-black font-weight-bold" for="name">Name</label>
                        <input type="text" id="name" class="form-control ">
                      </div>
                      <div class="col-md-6 form-group">
                        <label class="text-black font-weight-bold" for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control ">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 form-group">
                        <label class="text-black font-weight-bold" for="email">Email</label>
                        <input type="email" id="email" class="form-control ">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                        <input type="text" id="checkin_date" class="form-control">
                      </div>
                      <div class="col-md-6 form-group">
                        <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                        <input type="text" id="checkout_date" class="form-control">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="adults" class="font-weight-bold text-black">Adults</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="" id="adults" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4+</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="children" class="font-weight-bold text-black">Children</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="" id="children" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4+</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-12 form-group">
                        <label class="text-black font-weight-bold" for="message">Notes</label>
                        <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="submit" value="Reserve Now" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                      </div>
                    </div>
                  </form>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>

      <script src="{{asset('Landingpage/js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/jquery-migrate-3.0.1.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/popper.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/jquery.stellar.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/jquery.fancybox.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/jquery.easing.1.3.js')}}"></script>
      <script src="{{asset('Landingpage/js/aos.js')}}"></script>
      <script src="{{asset('Landingpage/js/bootstrap-datepicker.js')}}"></script>
      <script src="{{asset('Landingpage/js/jquery.timepicker.min.js')}}"></script>
      <script src="{{asset('Landingpage/js/main.js')}}"></script>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
  </html>
