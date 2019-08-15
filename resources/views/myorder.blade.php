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
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>Everlasting</span>.id</h1>
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
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/customer/register') }}">Register</a>
                  </li>
                  <li class="active">
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
              <h2>My Order</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start  contact -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            &nbsp;
          </div>
          <!-- End Left contact -->
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
              <form action="{{ route('customer.cekstatus') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="password">No. Resi</label>
                  <input type="text" name="resi" class="form-control" id="resi" placeholder="No. Resi" data-rule="minlen:4" data-msg="Mohon Masukkan No. Resi" required />
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Cari</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
          <!-- Start  contact -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            &nbsp;
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 15px;">
            &nbsp;
          </div>
          <!-- End Left contact -->
          <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
          <!-- Start  contact -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            &nbsp;
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12" style="background: rgba(242,240,228);padding: 10px;border-radius: 20px">
            <table style="width: 100%;">
              <tr style="border-bottom: 1px solid red">
                <th>Informasi</th>
                <th>Data</th>
              </tr>
              <tr style="border-bottom: 1px solid red">
                <td>Kode</td>
                <td>{{$code}}</td>
              </tr>
              <tr style="border-bottom: 1px solid red">
                <td>Status</td>
                  {{-- @if($status == 'Baru') --}}
                <td><b>Belum Terverifikasi</td>
                    {{-- @else --}}
                {{-- <td>Sudah Terverifikasi</td> --}}
                    {{-- @endif --}}
              </tr>
            </table>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
            &nbsp;
          </div>
          <!-- End Left contact -->
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

@endsection