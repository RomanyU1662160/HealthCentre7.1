@extends('layouts.app')

@section ('title', 'DataTable')
@section('style')

<!-- CSS files (include only one of the two files!) -->
<!-- If you are not using bootstrap: -->


@endsection

@section('content')
<div class=" m-4 card p-2">
<h3 class="text-info text-center">  Search Patients</h3>
  <table class="table table-bordered bg-romany-fade" id="users-table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Surname</th>
                  <th>DOB</th>
                  <th>Patient_number</th>
                  <th>post code</th>

              </tr>

          </thead>
      </table>
</div>



@endsection

@section('scripts')

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

<!-- add  @stack('scripts') in layouts.app befre this  -->


@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: false,
        serverSide: true,
        ajax: '{!! route('search.patient') !!}',
        columns: [
            {data: 'fname', name: 'fname' },
            { data: 'lname', name: 'lname' },
            { data: 'dob', name: 'dob' },
            { data: 'patient_number', name: 'patient_number' },
            { data: 'postcode', name: 'postcode' },

        ]
    });
});
</script>
@endpush
<!-- <script type="text/javascript" src="/media/js/site.js?_=30af62656a8280c8984f7320f0cc0923"></script>
<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fbasic_init%2Fzero_configuration.html" async></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
<script type="text/javascript" class="init"> -->
