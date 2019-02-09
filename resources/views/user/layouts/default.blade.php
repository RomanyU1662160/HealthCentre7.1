@extends('layouts.app')

@section('title','My Profile')
@section('content')
  <div class=" justify-content-center py-4">
    <div class="row">
        <div class="col-md-3">
          @include('user.layouts.sideNav')
        </div>

        <div class=" col-md-9 card  ">
          <div class="bg-romany-fade p-2 rounded ">
            <h3 class="text-center  bg-romany-fade text-white p-4">  {{$user->fullName()}}`s  Page  <small class="float-right"> {{$user->staff_number}}</small> </h3>

          </div>
          <div class="mt-4">


        @yield('profile.content')
        </div>
    </div>
  </div>
@endsection
