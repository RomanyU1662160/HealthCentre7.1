

@extends('layouts.app')


@section('title','Doctor page')

@section('content')
<h1 class="text-muted form-text text-center">Dr.{{$doctor->fname}}`s Page</h1>

<div class="row">
  <div class="col-md-3">
      @include('doctors.layouts.sideNav')

  </div>

  <div class="col-md-9 card  ">
      @yield('doctor.content')
  </div>

</div>




@endsection
