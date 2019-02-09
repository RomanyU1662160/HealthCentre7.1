@extends('user.layouts.default')

@section('profile.content')
<hr>
<div class="col-md-9 offset-md-2">

  <div class="text-muted">
    <h3 class="text-center "> Add/Edit profile Image </h3>
  </div>
<hr>
<form class="" action="index.html" method="post" enctype="multipart/form-data">
  <div class="input-group m-3 col-md-9  offset-md-3">

      <input type="file" class="form-control" aria-label="Select" aria-describedby="inputGroup-sizing-default">


    <button type="button" class="btn btn-info float-right">upload Image</button>
  </div>
</form>
</div>

@endsection
