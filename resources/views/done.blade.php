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
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/') }}#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/') }}#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/') }}#galery">Galery</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/') }}#vendor">Vendor</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/') }}#plan">Choose Plan</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/') }}#contact">Contact</a>
                  </li>
                  <li class="active">
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


  <!-- Start contact Area -->
  <div style="background-image: url({{ asset('frontend/img/bg.jpg') }});background-repeat: no-repeat, repeat;background-size: 100% 100%;min-height: 750px;">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container" style="background-color: rgba(255, 255, 255, 0.7);margin-top: 25px;border-radius: 50px;padding: 25px;">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Terima Kasih</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start  contact -->
          <div class="col-md-2 col-sm-2 col-xs-12">
            &nbsp;
          </div>
          <!-- End Left contact -->
          <!-- Start  contact -->
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="form contact-form" style="font-size: 19px;">
              <p>Silahkan periksa email anda untuk melihat detail pesanan yang sudah dilakukan</p>
              <p>Contoh undangan dapat dilihat melalui tombol berikut</p>
              <div class="text-center"><a target="_blank" href="{{ route('customer.undangan').'?id='.$id }}"><button type="submit">Undangan</button></a></div>
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
             <!--  <iframe src="{{ route('customer.undangan').'?id='.$id }}"></iframe> -->

            </div>
          </div>
          <!-- End Left contact -->
          <!-- Start  contact -->
          <div class="col-md-2 col-sm-2 col-xs-12">
            &nbsp;
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 15px;">
            &nbsp;
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

@endsection