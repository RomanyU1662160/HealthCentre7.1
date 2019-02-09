
<!-- Patients  Table -->



<table class="table table-striped table-hover " id="datatable">
  <thead class="bg-romany-fade rounded">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender </th>
      <th scope="col">patient_number</th>
      <th scope="col">Family Doctor</th>
      <th scope="col">Mobile</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
    <tbody>

    @foreach( $patients as $patient)



        <tr>
          <th scope="row" >{{$x++}}</th>
          <td>{{$patient->fullName()}} </td>
          <td><small class="text-muted"> {{$patient->dob->format('d-M-y')}} ({{$patient->age()}}years)</small> </td>

          <td>{{$patient->gender}}</td>

          <td>{{$patient->patient_number}}</td>
          <td>{{$patient->doctor->fullName()}}</td>

          <td><small class="text-muted"> {{$patient->mobile}}</small> </td>

          <td>

            <ul class="nav justify-content-end mt-2 mb-2">

              <li class="nav-item dropdown pr-2">
                <a class="nav-link dropdown-toggle btn-info rounded" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Patient Options</a>
                <div class="dropdown-menu ">
                  <a class="dropdown-item" href="{{route('patient.show',$patient)}}">View Patient Page</a>

                  <div class="dropdown-divider"></div>
                    @if(Auth::user()->role->name == 'Doctor' OR  Auth::user()->role->name == 'Admin')
                  <a class="dropdown-item" href="{{route('patient.prescriptions',$patient)}}" >Medical History</a>

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
            </td>
        </tr>



    @endforeach
    </tbody>
</table>


<!-- The Modal -->
