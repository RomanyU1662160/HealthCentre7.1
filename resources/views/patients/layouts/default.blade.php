@extends('layouts.app')

@section('title','Patient Page')

@section('content')

<div class="row p-1">

  <div class="col-md-3">
  @include('patients.layouts.sideNav')
  </div>

  <div class="col-md-9  ">
     @yield('patient.content')
  </div>

</div>

@endsection
