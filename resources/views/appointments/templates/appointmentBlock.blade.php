<!-- Appointments Table -->



<table class="table table-striped table-hover " id="datatable">
  <thead class="bg-romany-fade rounded">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Refrence</th>
      <th scope="col">Doctor</th>

      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
    <tbody>

    @foreach( $appointments as $appointment)

        <tr>
          <th scope="row">{{$x++}}</th>
          <td>{{$appointment->date->format('D, d-M-Y')}} </td>
          <td><small class="text-muted"> {{$appointment->refrence}}</small> </td>
            <td>{{$appointment->doctor->title}} {{$appointment->doctor->fname}}</td>

          <td>{{$appointment->start_at}}</td>
          <td>{{$appointment->end_at}}</td>

          <td><small class="text-muted"> {{$appointment->created_at->format('d-M-Y')}}</small> </td>
          <td><small class="text-muted"> {{$appointment->updated_at->diffForHumans()}}</small> </td>
          <td>

             <button type="button" class="btn btn-sm btn-outline-success {{($appointment->status=='passed')? ' disabled': ''}}" data-toggle="modal" data-target="#V-{{$appointment->refrence}}"> View </button>

              @if(Auth::user()->role->name == 'Doctor' Or !$appointment->isEditable())
            <!-- Popover message -->
            <span class="d-inline-block" data-toggle="popover" title="Action is not allowed" data-content="Not authorized or appointment is not editable " data-trigger="hover">
              <!-- Must add the Java Script code at the page bottom to work  -->

              @endif

              <a  href="{{route('appointment.update',$appointment)}}" class="btn btn-sm btn-outline-info {{($appointment->isEditable())? ' ': ' disabled'}} {{(Auth::user()->role->name=='Doctor') ? ' disabled' : ' '}}" > Edit</a>
  </span>


              <!-- Popover message -->

                <!-- Must add the Java Script code at the page bottom to work  -->
                @if(Auth::user()->role->name == 'Doctor' Or !$appointment->isEditable())
                <!-- Popover message -->
                <span class="d-inline-block" data-toggle="popover" title="Appointment is not Editable" data-content="Appointment is already passed" data-trigger="hover">

                @endif

        <button  class="btn btn-sm btn-outline-danger  {{($appointment->isEditable())? ' ': ' disabled'}}  {{(Auth::user()->role->name=='Doctor') ? ' disabled' : ' '}}" data-toggle="modal" data-target="#{{$appointment->refrence}}"    > Delete</button>

      </span>

            </td>
        </tr>


<!-- The Delete Modal -->
        <div class="modal fade" id="{{$appointment->refrence}}">
          <div class="modal-dialog  modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header bg-romany-fade">
                <h4 class="modal-title text-warning">Delete Appointment </h4>
                <button type="button" class="close  text-danger" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
          <div class="modal-body ">
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-4">
                     <strong>Refrence:</strong>
                    </div>
                    <div class="col-md-8">
                      {{$appointment->refrence}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-4">
                      <strong> Date: </strong>
                    </div>
                    <div class="col-md-8">
                      {{$appointment->date->format('d M Y')}} <small>(  {{$appointment->date->diffForHumans()}})</small>
                    </div>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="col-md-4">
                    <strong>Patient:</strong>
                  </div>
                  <div class="col-md-6">
                    {{$appointment->patient->fname}} {{$appointment->patient->lname}}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-4">
                    <strong>  Start at: </strong>

                  </div>
                  <div class="col-md-6">
                    {{$appointment->start_at}}
                  </div>
                </div>
            </div>
          </div>

              <!-- Modal footer -->
              <div class="modal-footer">
  <button type="button" class="btn bg-romany-fade text-warning float-left mr-5" data-dismiss="modal">Close</button>
             @if(Auth::user()->role->name == 'Doctor' Or !$appointment->isEditable())
           <!-- Popover message -->
           <span class="d-inline-block" data-toggle="popover" title="Appointment is not Editable" data-content="Appointment is already passed" data-trigger="hover">

             @endif

                <a  class="btn btn-outline-danger float-right ml-5{{($appointment->isEditable())? ' ': ' disabled'}} " href="{{route('appointment.delete',$appointment)}}"> Confirm Delete </a>
              </div>
</span>
            </div>
          </div>
    </div>


<!-- The Appointment details  Modal -->
          <div class="modal fade" id="V-{{$appointment->refrence}}">
            <div class="modal-dialog  modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header  bg-romany-fade">
                  <h4 class="modal-title text-warning"> Appointment Details </h4>
                  <button type="button" class="close  text-info" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
            <div class="modal-body ">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-4">
                       <strong>Refrence:</strong>
                      </div>
                      <div class="col-md-8">
                        {{$appointment->refrence}}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-4">
                        <strong> Date: </strong>
                      </div>
                      <div class="col-md-6">
                        {{$appointment->date->format('d M Y')}} <small>(  {{$appointment->date->diffForHumans()}}) </small>
                      </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-4">
                      <strong>Patient:</strong>
                    </div>
                    <div class="col-md-6">
                      {{$appointment->patient->fname}} {{$appointment->patient->lname}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-4">
                      <strong>  Start at: </strong>

                    </div>
                    <div class="col-md-6">
                      {{$appointment->start_at}}
                    </div>
                  </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="col-md-4">
                    <strong>Doctor:</strong>
                  </div>
                  <div class="col-md-6">
                    {{$appointment->doctor->fname}} {{$appointment->doctor->lname}}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-4">
                    <strong>  Start at: </strong>

                  </div>
                  <div class="col-md-6">
                    {{$appointment->start_at}}
                  </div>
                </div>
              </div>

            </div>

                <!-- Modal footer -->

              <div class="modal-footer">
                <button type="button" class="btn btn-danger mr-5" data-dismiss="modal">Close</button>




                   <a  href="{{route('patient.show',$appointment->patient)}}" class=" float-right btn bg-romany-fade text-warning">View Patient Details  </a>



                   @if(Auth::user()->role->name == 'Doctor' Or !$appointment->isEditable())
                 <!-- Popover message -->
                 <span class="d-inline-block" data-toggle="popover" title="Authorized Staff Only" data-content="Action is not allowed" data-trigger="hover">
                   <!-- Must add the Java Script code at the page bottom to work  -->

                   @endif


                    <a  href="{{route('appointment.update',$appointment)}}" class=" float-right btn btn-info {{($appointment->isEditable())? ' ': ' disabled'}} {{(Auth::user()->role->name == 'Doctor')? ' disabled' : ' '}}">Edit Appointment</a>
                    </span>

                 @if(Auth::user()->role->name != 'Doctor')
                 <span class="d-inline-block" data-toggle="popover" title="Doctors Only" data-content="Doctors only can issue prescriptions and add notes " data-trigger="hover">
                 @endif
                    <a  href="{{route('appointment.details',$appointment)}}" class=" float-right btn btn-success {{($appointment->status=='passed')? ' disabled': ''}}  {{(Auth::user()->role->name != 'Doctor')? ' disabled' : ' '}}">Issue Prescription/ Notes </a>
                </span>



            </div>

              </div>
            </div>
      </div>
    @endforeach
    </tbody>
</table>


<!--End  The Modal -->

<!-- Javascript to show the pop over -->
<script>
$(function () {
  $('[data-toggle="popover"]').popover({
     trigger: 'hover'

  })
})
  $('#example').popover(options)
</script>
