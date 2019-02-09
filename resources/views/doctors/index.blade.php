@extends('layouts.app')


@section('title','All Doctors')

@section('content')


<h1>All Doctors</h1>
@foreach($doctors as $doctor)
<p class=" text-muted ">{{$doctor->fname}} {{$doctor->lname}}</p>

@endforeach

@endsection
