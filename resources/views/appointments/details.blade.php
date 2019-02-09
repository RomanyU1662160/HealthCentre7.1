@extends('layouts.app')

@section('title',' appointment details')
@section('content')

@if(!isset($appointment))

<h3 class="text-info text-center">Sorry , Cannot find this appointment </h3>

@endif



@include('appointments.templates.appointmentDetailsBlock')


@stop
