<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('frontend/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('frontend/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/venobox/venobox.css') }}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('frontend/css/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->

  <link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

  <style type="text/css">
    .ucapan {
      font-size: 6em;
      font-weight: 400;
      color: #ea6a9f;
      padding-right: .15em;
      text-shadow: 2px 2px 8px #f581ae;
      font-family: 'Great Vibes', cursive;
    }
    .form-group{
      min-height: 70px;
    }

  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <!-- Start contact Area -->
  @yield('content')
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Everlasting.id</strong>. All Rights Reserved
              </p>
            </div>
             <!--<div class="credits">

                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness

              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('frontend/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/knob/jquery.knob.js') }}"></script>
  <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/parallax/parallax.js') }}"></script>
  <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/lib/appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('frontend/contactform/contactform.js') }}"></script>

  <script src="{{ asset('frontend/js/main.js') }}"></script>
{{-- Google Maps --}}
<script src="https://maps.google.com/maps/api/js?key=AIzaSyD_eiIH24e4fILRNWijlDHOMpo4dbVelJY"></script>
<script src="{{ asset('js/gmaps.js') }}"></script>
<style type="text/css">
    .user-panel>.image>img {
      width: 100%;
      max-width: 150px;
      height: auto;
      margin: 0 auto;
      display: block;
    }
    #map {
      width: 100%;
      height: 400px;
    }
    </style>

  @stack('scripts')
</body>
</html>
