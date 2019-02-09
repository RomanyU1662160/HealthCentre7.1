@extends('layouts.app')


@section('title','All Appointments')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection


@section('content')

@if(! $appointments->count())
<div class=" mt-5">
  <h4 class="text-center text-muted"> No appointments to show  </h4>
</div>

@endif
 <h3 class="text-center text-info"> Search Appointments list</h3>

@include('appointments.templates.appointmentBlock')

@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
