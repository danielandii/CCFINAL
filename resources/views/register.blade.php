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
              <h2>Register</h2>
            </div>
          </div>
        </div>
        <div class="row">
        <form action="{{ route('customer.order') }}" method="POST">
            @csrf
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
                <div class="form-group">
                  <label for="password">Nama Pemesan</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Mohon Masukkan Nama" />
                  @if ($errors->has('name'))
                  <div class="validation">
                      {{ $errors->first('name') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Mohon Masukkan format email yang benar" />
                  @if ($errors->has('email'))
                  <div class="validation">
                      {{ $errors->first('email') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Paket</label>
                  <select name="plan_id" class="form-control" >
                    @foreach ($plans as $plan)
                        <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('plan_id'))
                  <div class="validation">
                      {{ $errors->first('plan_id') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Nama Mempelai Pria</label>
                  <input type="text" name="male_name" class="form-control" id="male_name" placeholder="Nama Mempelai Pria" data-rule="minlen:4" data-msg="Mohon Masukkan Nama" />
                  @if ($errors->has('male_name'))
                  <div class="validation">
                      {{ $errors->first('male_name') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Nama Mempelai Wanita</label>
                  <input type="text" name="female_name" class="form-control" id="female_name" placeholder="Nama Mempelai Wanita" data-rule="minlen:4" data-msg="Mohon Masukkan Nama" />
                  @if ($errors->has('female_name'))
                  <div class="validation">
                      {{ $errors->first('female_name') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                    <label for="Latitude">Latitude</label>
                    <input type="text" name="lat" class="form-control" id="lat" placeholder="Latitude Peta"/>
                    @if ($errors->has('lat'))
                    <div class="validation">
                        {{ $errors->first('lat') }}
                    </div>
                  @endif
                    {{-- <div class="validation"></div> --}}
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
                  <input type="date" name="date" class="form-control" id="date" placeholder="Tanggal"/>
                @if ($errors->has('date'))
                  <div class="validation">
                      {{ $errors->first('date') }}
                  </div>
                @endif
                {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Jam Acara</label>
                  <input type="time" name="time" class="form-control" id="time" placeholder="Jam"/>
                  @if ($errors->has('time'))
                  <div class="validation">
                      {{ $errors->first('time') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Alamat</label>
                  <input type="text" name="address1" class="form-control" id="address1" placeholder="Alamat"/>
                @if ($errors->has('address1'))
                  <div class="validation">
                      {{ $errors->first('address1') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Keluarga Mempelai Pria</label>
                  <input type="text" name="family1" class="form-control" id="family1" placeholder="Keluarga Mempelai Pria"/>
                  @if ($errors->has('family1'))
                  <div class="validation">
                      {{ $errors->first('family1') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                  <label for="password">Keluarga Mempelai Wanita</label>
                  <input type="text" name="family2" class="form-control" id="family2" placeholder="Keluarga Mempelai Wanita"/>
                  @if ($errors->has('family2'))
                  <div class="validation">
                      {{ $errors->first('family2') }}
                  </div>
                @endif
                  {{-- <div class="validation"></div> --}}
                </div>
                <div class="form-group">
                    <label for="Longitude">Longitude</label>
                    <input type="text" name="long" class="form-control" id="long" placeholder="Longitude Peta"/>
                    @if ($errors->has('long'))
                    <div class="validation">
                        {{ $errors->first('long') }}
                    </div>
                  @endif
                    {{-- <div class="validation"></div> --}}
                </div>
            </div>
          </div>
          <!-- End Left contact -->

          <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12">
                <div id="map"></div>
          </div>

          <!-- Start  contact -->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form contact-form">
              <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div> -->
                <div class="text-center">
                    <button type="submit" style="width: 30%">Pesan</button>
                </div>
            </div>
          </div>
          <!-- End Left contact -->
        </form>
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
