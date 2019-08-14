<!DOCTYPE html>
<html>
    @include('admin.templates.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.templates.partials._header')

    @include('admin.templates.partials._sidebar')

  <div class="content-wrapper">
    <section class="content">
        @yield('content')
    </section>
  </div>

    @include('admin.templates.partials._footer')
</div>

    @include('admin.templates.partials._scripts')
</body>
</html>
