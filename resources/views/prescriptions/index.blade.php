@extends ('layouts.app')
@section('title','All Patients')

@section('content')

@if(!$prescriptions->count()>0)

  <h3 class="text-center text-info m-5"> No prescriptions to show </h3>

@else

  <h3 class="text-center text-info"> All prescriptions list </h3>


{{$prescriptions->links()}}
@include('prescriptions.templates.prescriptionBlock')

@endif


@endsection
