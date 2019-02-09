
@extends('layouts.app')

@section('title','404')
@section('content')

    <h1 class="text-center text-info">{{ $exception->getMessage() }}</h1>

<h4 class="text-center text-warning ">  Please click on the Home page or the Back Button  </h4>
<div class="container">


   <a href="{{URL::previous()}}" class="btn bg-romany-fade float-left text-white"> <--- Previouse page   </a>
    <a href="{{route('home')}}" class="btn btn-info float-right">  Home Page --->  </a>
</div>

@endsection
