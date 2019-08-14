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
                  <li class="active">
                    <a class="page-scroll" href="{{ URL::to('/customer/register') }}">Register</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ URL::to('/customer/order') }}">My Order</a>
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
              <h2>Register</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
              <form action="{{Route('customer.order')}}" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <label for="password">Nama Pemesan</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Mohon Masukkan Nama" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Mohon Masukkan format email yang benar" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Paket</label>
                  <select name="plan" class="form-control" >
                    <option value="1">Paket Ekonomis</option>
                    <option value="2">Paket Standard</option>
                    <option value="3">Paket Premium</option>
                  </select>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Nama Mempelai Pria</label>
                  <input type="text" name="male_name" class="form-control" id="male_name" placeholder="Nama Mempelai Pria" data-rule="minlen:4" data-msg="Mohon Masukkan Nama" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Nama Mempelai Wanita</label>
                  <input type="text" name="female_name" class="form-control" id="female_name" placeholder="Nama Mempelai Wanita" data-rule="minlen:4" data-msg="Mohon Masukkan Nama" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                    <label for="Latitude">Latitude</label>
                    <input type="text" name="lat" class="form-control" id="lat" placeholder="Latitude Peta"/>
                    <div class="validation"></div>
                </div>
            </div>
          </div>
          <!-- End Left contact -->
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
                <div class="form-group">
                  <label for="password">Tanggal Acara</label>
                  <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Jam Acara</label>
                  <input type="text" name="jam" class="form-control" id="jam" placeholder="Jam"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Keluarga Mempelai Pria</label>
                  <input type="text" name="family1" class="form-control" id="family1" placeholder="Keluarga Mempelai Pria"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="password">Keluarga Mempelai Wanita</label>
                  <input type="text" name="family2" class="form-control" id="family2" placeholder="Keluarga Mempelai Wanita"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                    <label for="Longitude">Longitude</label>
                    <input type="text" name="long" class="form-control" id="long" placeholder="Longitude Peta"/>
                    <div class="validation"></div>
                </div>
            </div>
          </div>

          <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12">
                <div id="map"></div>
            </div>

          <!-- End Left contact -->
          <!-- Start  contact -->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form contact-form">
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
                <div class="text-center">
                    <button type="submit" style="width: 30%">Pesan</button>
                </div>
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
@push('scripts')
<script>
    var map = new GMaps({
      el: '#map',
      zoom: 12,
      lat: -7.024554,
      lng: 110.3470252,
      click: function(e) {
        // alert('click');
        var latLng = e.latLng;
        var lat = $('#lat');
        var long = $('#long');

        lat.val(latLng.lat());
        long.val(latLng.lng());
        map.removeMarkers();
        map.addMarker({
            lat: latLng.lat(),
            lng: latLng.lng(),
            title: 'Create Here',
            click: function(e) {
                alert('You clicked in this marker');
            }
        });

    },
});
</script>
@endpush
