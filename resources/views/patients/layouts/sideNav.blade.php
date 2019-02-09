

  <div class="row card mb-2  ">
    <ul class="nav flex-column nav-pills text-center">
      <li class="nav-item bg-romany-fade text-center card-heading  p-2 rounded border">
          <h3 class="text-white "> Patient Details</h3>
      </li>
      <div class="col-md-10 offset-md-1">
          <li class="nav-item border-bottom ">
            <a class="nav-link  {{request()->is('patient/show/*')? ' bg-secondary' : ' '}} " href="{{route('patient.show',$patient)}}">Details</a>
          </li>
          <li class="nav-item border-bottom ">
            <a class="nav-link {{request()->is('patient/update/*')? ' bg-secondary' : ' '}}" href="{{route('patient.update',$patient)}}"> Update Details</a>
          </li>

          <li class="nav-item border-bottom ">
            <a class="nav-link {{request()->is('patient/sms/*')? ' bg-secondary' : ' '}}" href="{{route('patient.sms',$patient)}}"> Send an SMS  </a>
          </li>

          <li class="nav-item border-bottom">
            <a class="nav-link {{request()->is('patient/add_avatar/*')?' bg-secondary' : ' '}}" href="{{route('patient.showAvatar',$patient)}}">Upload/Edit Image</a>
          </li>

          <li class="nav-item btn btn-outline-danger mt-3  ">
            <a class="nav-link text-dark  {{request()->is('patient/delete/*')?' bg-secondary' : ' '}}" href="{{route('patient.showDelete',$patient)}}"> Remove Patient </a>
          </li>
            <p> <small class="text-danger " >This will remove patient and all his details</small></p>

      </div>
  </ul>
</div>

  <div class="row card mb-2  ">
    <ul class="nav flex-column nav-pills text-center">
      <li class="nav-item bg-romany-fade text-center card-heading  p-2 rounded border">
          <h3 class="text-white "> Patient Appointments</h3>
      </li>
      <div class="col-md-10 offset-md-1">
          <li class="nav-item border-bottom ">
            <a class="nav-link{{request()->is('patient/*/all_appointments')? ' bg-secondary' : ' '}}  " href="{{route('patient.allAppointments',$patient)}}">All Appointments</a>
          </li>
          <li class="nav-item border-bottom ">
            <a class="nav-link{{request()->is('patient/*/future_appointments')? ' bg-secondary' :' '}}" href="{{route('patient.futureAppointments',$patient)}}"> Future Appointments</a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link {{request()->is('patient/*/passed_appointments')? ' bg-secondary' : ' '}}" href="{{route('patient.passedAppointments',$patient)}}">Past Appointments</a>
          </li>


          <li class="nav-item border-bottom">

              <a class="nav-link {{request()->is('patient/new_appointment/*')? ' bg-secondary' : ' '}}" href="{{route('patient.newAppointment',$patient)}}">Book New Appointment</a>
          </li>
      </div>
  </ul>
</div>

    <div class="row card mb-2  ">
      <ul class="nav flex-column nav-pills text-center">
        <li class="nav-item bg-romany-fade text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> Patient Medical History</h3>
        </li>
        <div class="col-md-10 offset-md-1">
          <li class="nav-item ">
            <a class="nav-link border-bottom {{request()->is('patient/prescriptions/*')? ' bg-secondary' : ' '}}" href="{{route('patient.prescriptions',$patient)}}">Prescriptions Issued</a>
          </li>
          <li class="nav-item border-bottom ">
            <a class="nav-link" href="#">Drugs Issued </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link" href="#">Allergics</a>
          </li>

        </div>
        </ul>
      </div>
