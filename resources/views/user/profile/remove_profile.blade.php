@extends('user.layouts.default')

@section('profile.content')
<div class="text-muted ">
  <h3 class="text-center  bg-romany-fade text-white p-4  rounded"> Delete  Profile </h3>
</div>

  <div class="col-md-6 offset-md-3 mt-4 " >
    <h4 class="text-danger mt-4  mb-4"> Delete <strong>{{$user->fullname()}}`s </strong>   profile and all his records? </h4>
<a  class="btn btn-outline-info float-left " href="{{route('user.page',$user)}}"> Cancel</a>
<a  class="btn btn-outline-danger float-right " href="{{route('user.delete',$user)}}"> Confirm Delete </a>
  </div

@endsection
