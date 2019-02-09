

<!-- Patient media object template  -->

<ul class="list-unstyled " >
  <li class="media bg-light">
    <img class="mr-3" src="{{$patient->avatar()}}" alt="Patient image" style="width:40px; height:40px;">
    <div class="media-body ">
      <div class="bg-romany-fade p-2 rounded ">
          <h4 class="mt-1 mb-1 text-format">{{$patient->fullName()}}</h4>
      </div>

<div class="row border-bottom">
  <div class="col-md-3 text-center">
    <strong> Name</strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$patient->fullName()}} </p>
  </div>
  <div class="col-md-3 text-center">
    <strong>Patient Number</strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$patient->patient_number}} {{$patient->lname}} </p>
  </div>
</div>

<div class="row border-bottom">
  <div class="col-md-3 text-center">
    <strong> DOB </strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$patient->dob->format('d-M-Y')}}   <small class="text-muted">( {{$patient->age()}} </small>years old ) </p>
  </div>
  <div class="col-md-3 text-center">
    <strong> Family Doctor </strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$patient->doctor->fname}} {{$patient->doctor->lname}} </p>
  </div>

</div>

<div class="row border-bottom">
  <div class="col-md-3 text-center">
    <strong> Gender</strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$patient->gender}} </p>
  </div>

  <div class="col-md-3 text-center">
    <strong> Mobile </strong>
  </div>
  <div class="col-md-3">
    <p class="text-muted">{{$patient->mobile}} </p>
  </div>


</div>



  <ul class="nav justify-content-end mt-2 mb-2">

    <li class="nav-item dropdown pr-2">
      <a class="nav-link dropdown-toggle btn-info rounded" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Patient Options</a>
      <div class="dropdown-menu ">
        <a class="dropdown-item" href="{{route('patient.show',$patient)}}">View Patient Page</a>

        <div class="dropdown-divider"></div>
          @if(Auth::user()->role->name == 'Doctor' OR  Auth::user()->role->name == 'Admin')
        <a class="dropdown-item" href="{{route('patient.prescriptions',$patient)}}">Medical History</a>

          <div class="dropdown-divider"></div>
          @endif
          @if(Auth::user()->role->name == 'Receptionist' OR  Auth::user()->role->name == 'Admin')
        <a class="dropdown-item   " href="{{route('patient.newAppointment',$patient)}}">Book Appointment</a>
        @endif
          <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Send Email</a>
    </div>
    </li>
</ul>




    </div>
  </li>

</ul>
