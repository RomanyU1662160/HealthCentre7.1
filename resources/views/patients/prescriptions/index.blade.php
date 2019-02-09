@extends('patients.layouts.default')


@section('patient.content')

@if(!isset($prescriptions))
<h3 class="text-centre text-info"> No prescriptions to show for {{$patient-> fullName()}} </h3>
@else
<h3 class="text-info text-center"> Prescriptions Issued to {{$patient->fullName()}} </h3>
  @include('prescriptions.templates.prescriptionBlock')

@endif
@endsection
