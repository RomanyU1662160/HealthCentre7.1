@extends('user.layouts.default')

@section('profile.content')




@if(!isset($patients))

<h3 class="text-center text-info"> {{$doctor->fullName()}} has no patients </h3>
@else
<h3 class="text-center text-info">{{$doctor->title}}. {{$doctor->fname}}'s patients </h3>
<div class="col-md-12 ">
<div class="">
  {{$patients->links()}}
</div>
@foreach($patients as $patient)

  @include('patients.templates.patientBlock')

@endforeach
@endif
</div>



@endsection
