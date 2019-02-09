@extends('layouts.app')

@section('title','Home')
@section('content')



<h2 class="help-block text-mute"> Welcome to Canal West Health Center </h2>
you are currently looged as : 
{{Auth::user()->role->name}}

@endsection
