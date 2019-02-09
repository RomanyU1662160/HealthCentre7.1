@extends ('layouts.app')
@section('title','All Patients')
@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
<h1 class="text-info text-center">Search Patients List </h1>
<div class="mt-2">



@include('patients.templates.patientDataTable')



</div>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
