<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Health Center') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<!-- dataTable -->

@yield('style')
<!-- <script src="{{ asset('js/Popper.js') }}"></script> -->
<script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    <div id="container-fluid">
      @include('layouts.partials.nav')
    </div>
          <div class="col-md-10 offset-md-1" id="app">
            @include('layouts.errors.list')
            @include('layouts.partials.flashes')

              @yield('content')


          </div>

    <!-- Scripts -->



         <!-- App scripts -->
         @stack('scripts')
         @yield('scripts')
</body>
</html>
