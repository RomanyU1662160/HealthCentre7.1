

<!-- user media object template  -->

<ul class="list-unstyled ">
  <li class="media bg-light">
    <img class="mr-3" src="{{$user->avatar()}}" alt="user image">
    <div class="media-body ">
      <div class="bg-romany-fade p-2 rounded ">
          <h4 class="mt-1 mb-1 text-format">{{$user->fullName()}} </h4>
      </div>

<div class="row border-bottom">
  <div class="col-md-3 text-center">
    <strong> Name</strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$user->fullName()}} </p>
  </div>
  <div class="col-md-3 text-center">
    <strong>staff Number</strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$user->staff_number}}</p>
  </div>
</div>

<div class="row border-bottom">
  <div class="col-md-3 text-center">
    <strong> DOB </strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$user->dob->format('d-M-Y')}}   <small class="text-muted">( {{$user->age()}} </small>years old ) </p>
  </div>


  <div class="col-md-3 text-center">
    <strong> Address </strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$user->house}} {{$user->address}} , {{$user->postcode}}</p>
  </div>

</div>

<div class="row border-bottom">
  <div class="col-md-3 text-center">
    <strong> Gender</strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$user->gender}} </p>
  </div>

  <div class="col-md-3 text-center">
    <strong> Mobile </strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$user->mobile}} </p>
  </div>


</div>



  <ul class="nav justify-content-end mt-2 mb-2">

    <li class="nav-item dropdown pr-2">
      <a class="nav-link dropdown-toggle btn-info rounded" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More Options</a>
      <div class="dropdown-menu ">
        <a class="dropdown-item" href="{{route('user.page',$user)}}">View User's Page</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('user.profile.update',$user)}}">Update Details</a>
          <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Send Email</a>
          <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Add Privilige</a>
    </div>
    </li>
</ul>




    </div>
  </li>

</ul>
