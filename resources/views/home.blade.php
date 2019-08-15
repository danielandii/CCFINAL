@extends('frontend')

@section('content')
  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="{{ URL::to('/') }}">
                  <!-- <h1><span>Everlasting</span>.id</h1> -->
                  <img src="{{ asset('frontend/img/logo.png') }}" style="height: 60px;margin-top: -10px;">
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#galery">Galery</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#vendor">Vendor</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#plan">Choose Plan</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/customer/register') }}">Register</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/customer/cek-status') }}">My Order</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->


  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides" style="max-height: 800px">
        <img src="http://d2azhkhpnqadb9.cloudfront.net/1.jpg" alt="" title="#slider-direction-1" />
        <img src="http://d2azhkhpnqadb9.cloudfront.net/2.jpg" alt="" title="#slider-direction-2" />
        <img src="http://d2azhkhpnqadb9.cloudfront.net/3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Vina & Tatom</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2 ucapan">We're waiting for the best</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Suci & Bayu</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2 ucapan">Feeling awesome</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Yuanita & Indra</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2 ucapan">That was so wonderful</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Resepsimu.id</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="http://d2azhkhpnqadb9.cloudfront.net/about.jpg" alt="">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">Event organizer</h4>
              </a>
              <p>
                Sejak 2019, everlasting.id adalah wedding EO yang menyediakan jasa kepada para pasangan yang akan menikah.
              </p>
              <p>
                Bekerjasama dengan berbagai vendor, kami menyediakan berbagai pilihan yang cocok untuk setiap pasangan.
              </p>
              <p>
                Berbagai service yang kami tawarkan seperti :
              </p>
              <ul>
                <li>
                  <i class="fa fa-check"></i> Desain Undangan
                </li>
                <li>
                  <i class="fa fa-check"></i> Photographer
                </li>
                <li>
                  <i class="fa fa-check"></i> Venue
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Start Service area -->
  <div id="galery" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Galery</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 10px">
          	<img src="http://d2azhkhpnqadb9.cloudfront.net/g1.jpg">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 10px">
          	<img src="http://d2azhkhpnqadb9.cloudfront.net/g2.jpg">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 10px">
          	<img src="http://d2azhkhpnqadb9.cloudfront.net/g3.jpg">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 10px">
          	<img src="http://d2azhkhpnqadb9.cloudfront.net/g4.jpg">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 10px">
          	<img src="http://d2azhkhpnqadb9.cloudfront.net/g5.jpg">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 10px">
          	<img src="http://d2azhkhpnqadb9.cloudfront.net/g6.jpg">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- Start team Area -->
  <div id="vendor" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Vendor</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
					<img src="http://d2azhkhpnqadb9.cloudfront.net/about.jpg" alt="" style="height: 250px">
				</a>
              </div>
              <div class="team-content text-center">
                <h4>MyBride</h4>
                <p>Bridal</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
					<img src="http://d2azhkhpnqadb9.cloudfront.net/t2.jpg" alt="" style="height: 250px">
				</a>
              </div>
              <div class="team-content text-center">
                <h4>Lisa</h4>
                <p>Photographer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
					<img src="http://d2azhkhpnqadb9.cloudfront.net/t3.jpg" alt="" style="height: 250px">
				</a>
              </div>
              <div class="team-content text-center">
                <h4>Linda</h4>
                <p>MC</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
					<img src="http://d2azhkhpnqadb9.cloudfront.net/4.jpg" alt="" style="height: 250px">
				</a>
              </div>
              <div class="team-content text-center">
                <h4>Hotel H</h4>
                <p>Venue</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->

  <!-- start pricing area -->
  <div id="plan" class="pricing-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Choose Plan</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="pri_table_list">
            <h3>Ekonomis <br/> <span>Rp 10.000.000</span></h3>
            <ol>
              <li class="check">Undangan</li>
              <li class="check cross">MC</li>
              <li class="check cross">Katering</li>
              <li class="check">Photographer</li>
              <li class="check cross">Hotel Venue</li>
            </ol>
            <!-- <button>sign up now</button> -->
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="pri_table_list active">
            <span class="saleon">top sale</span>
            <h3>standard <br/> <span>25.000.000</span></h3>
            <ol>
              <li class="check">Undangan</li>
              <li class="check">MC</li>
              <li class="check">Katering</li>
              <li class="check">Photographer</li>
              <li class="check cross">Hotel Venue</li>
            </ol>
            <!-- <button>sign up now</button> -->
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="pri_table_list">
            <h3>premium <br/> <span>50.000.000</span></h3>
            <ol>
              <li class="check">Undangan</li>
              <li class="check">MC</li>
              <li class="check">Katering</li>
              <li class="check">Photographer</li>
              <li class="check">Hotel Venue</li>
            </ol>
            <!-- <button>sign up now</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End pricing table area -->

  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: +1 5589 55488 55<br>
                  <span>Monday-Friday (9am-5pm)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: info@example.com<br>
                  <span>Web: www.example.com</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Location: A108 Adam Street<br>
                  <span>NY 535022, USA</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

@endsection
