@extends('patients.layouts.default')



@section('patient.content')
<h1 class=" text-muted text-center">{{$patient->fullName()}}` Appointments</h1>


@include('appointments.templates.appointmentBlock')

@endsection
