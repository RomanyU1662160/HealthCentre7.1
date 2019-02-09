
<table class="table table-striped table-hover ">
  <thead class="bg-romany-fade rounded">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date of issue</th>
      <th scope="col">Last updated</th>
      <th scope="col">Doctor </th>
      <th scope="col">Patient</th>


      <th scope="col">Options</th>
    </tr>
  </thead>
    <tbody>
@foreach($prescriptions as $prescription)

  <tr>
<td>{{$x++}}</td>
<td>{{$prescription->created_at->format('D, d M Y')}} </td>
<td>{{$prescription->updated_at->diffForHumans()}} </td>
<td>Dr.{{$prescription->appointment->doctor->fname}}</td>
<td>{{$prescription->appointment->patient->fullName()}} </td>

<td>

  <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#A-{{$prescription->appointment->refrence}}"> Appointment</button>
  <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#D-{{$prescription->appointment->refrence}}"> View Drugs </button>


 </td>
  </tr>



<!-- The Appointment details  Modal -->
          <div class="modal fade" id="A-{{$prescription->appointment->refrence}}">
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
                        {{$prescription->appointment->refrence}}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-4">
                        <strong> Date: </strong>
                      </div>
                      <div class="col-md-6">
                        {{$prescription->appointment->date->format('d M Y')}} <small>({{$prescription->appointment->date->diffForHumans()}}) </small>
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
                      {{$prescription->appointment->patient->fname}} {{$prescription->appointment->patient->lname}}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-4">
                      <strong>  Start at: </strong>

                    </div>
                    <div class="col-md-6">
                      {{$prescription->appointment->start_at}}
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
                    {{$prescription->appointment->doctor->fname}} {{$prescription->appointment->doctor->lname}}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-4">
                    <strong>  Start at: </strong>

                  </div>
                  <div class="col-md-6">
                    {{$prescription->appointment->start_at}}
                  </div>
                </div>
              </div>

            </div>

                <!-- Modal footer -->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
                    <a  href="{{route('appointment.update',$prescription->appointment)}}" class=" float-right btn btn-info{{($prescription->appointment->status=='passed')? ' disabled': ''}}">Edit Appointment</a>
                      <a  href="{{route('appointment.details',$prescription->appointment)}}" class=" float-right btn btn-info{{($prescription->appointment->status=='passed')? ' disabled': ''}}">Issue Prescription/ Notes </a>
                  </div>

              </div>
            </div>
      </div>



<!-- The prescription drugs  list  Modal -->
                <div class="modal fade" id="D-{{$prescription->appointment->refrence}}">
                  <div class="modal-dialog  modal-lg">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header  bg-romany-fade">
                        <h4 class="modal-title text-warning"> Prescription Drugs List    </h4>
                        <button type="button" class="close  text-info" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                  <div class="modal-body ">
              @foreach($prescription->drugs as $drug)
                        <div class="row">
                          <div class="col-md-6">
                            <div class="col-md-2">
                             <strong>Name:</strong>
                            </div>
                            <div class="col-md-8">
                              {{$drug->name}}
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="col-md-2">
                              <strong>Notes: </strong>
                            </div>
                            <div class="col-md-9">
                              {{$drug->pivot->notes}}
                            </div>
                          </div>
                      </div>
                        <hr>
                      @endforeach




                  </div>

                      <!-- Modal footer -->

                        <div class="modal-footer">

                        </div>

                    </div>
                  </div>
            </div>
@endforeach
   </tbody>
 </table>
