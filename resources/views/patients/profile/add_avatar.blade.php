@extends('patients.layouts.default')

@section('patient.content')

<div class="card ">
  <div class="text-muted">
      <h3 class="text-center bg-romany-fade p-4 text-white"> Add/Edit profile Image </h3>
    </div>
<div class="col-md-9 offset-md-2">

  <hr>
  <form class="" action="#" method="post" enctype="multipart/form-data">
    <div class="input-group m-3 col-md-9  offset-md-3">

        <input type="file" class="form-control" aria-label="Select" aria-describedby="inputGroup-sizing-default">

      <button type="button" class="btn btn-info float-right">upload Image</button>
    </div>
  </form>
  </div>
</div>
@endsection
