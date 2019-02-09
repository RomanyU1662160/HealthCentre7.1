@extends('patients.layouts.default')



@section('patient.content')
<h3 class="text-center  bg-romany-fade text-white p-4">{{$patient->fname}} {{$patient->lname}}`s  Page</h3>

<hr>
  @include('patients.templates.patientBlock')

<a href="{{(URL::previous())? : Route('patient.index')}}" class="btn btn-secondary"> <<<<---Back </a>
@endsection
