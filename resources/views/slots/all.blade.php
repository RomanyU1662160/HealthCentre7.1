@extends('layouts.app')

@section('title','All Slots')

@section('content')
@if(isset($slots))

<div class="card bg-secondary">
  @foreach($slots as $slot)
 @include('slots.templates.slotBlock')
  @endforeach
</div>
@else
  <p>No slots found </p>

@endif




@stop
