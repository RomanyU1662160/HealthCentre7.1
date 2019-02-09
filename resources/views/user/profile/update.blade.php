@extends('user.layouts.default')

@section('profile.content')
<hr>
  <div class="text-muted ">
    <h3 class="text-center "> Update Profile </h3>
  </div>
<hr>
<div class="col-md-9 offset-md-2">

    <form class="" action="index.html" method="post">
        @csrf
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <button type="button" class="btn btn-info float-right">Update Profile</button>
    </form>
</div>

@endsection
