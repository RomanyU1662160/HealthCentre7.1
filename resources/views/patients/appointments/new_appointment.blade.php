@extends('patients.layouts.default')
@section('title','New Appointment')
@section('patient.content')




<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header bg-romany-fade text-center text-white"> <h5> New Appointment </h5>  {{$patient->fullName()}}   </div>

                <div class="card-body">
                    <form method="POST" action="{{route('patient.newAppointment',$patient)}}" class="{{($errors->count())? ' was-validated' : ' '}} ">
                        @csrf




                        <div class="form-group row">
                            <label for="patient_name" class="col-md-4 col-form-label text-md-right">Patient Name</label>
                            <div class="col-md-6">
                            <input id="patient_name" type="text" class="form-control{{ $errors->has('patient_name') ? ' is-invalid' : '' }}" name="patient_name" value="{{$patient->fullName()}}"   {{($errors->count())? ' required' : ' '}} readonly >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="patient_number" class="col-md-4 col-form-label text-md-right">Patient Number</label>
                            <div class="col-md-6">
                            <input id="patient_number" type="text" class="form-control{{ $errors->has('patient_number') ? ' is-invalid' : '' }}" name="patient_number" value="{{$patient->patient_number}}"   {{($errors->count())? ' required' : ' '}} readonly >
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="age" class="col-md-4 col-form-label text-md-right"> Age</label>
                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $patient->dob->age }} years" {{($errors->count())? ' required' : ' '}} readonly >
                           </div>
                        </div>

                        <div class="form-group row">
                          <label for="gender" class="col-md-4 col-form-label text-md-right"> Gender</label>
                            <div class="col-md-6">
                                <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ $patient->gender }}"  readonly>
                           </div>
                        </div>

                        <div class="form-group row">
                          <label for="gender" class="col-md-4 col-form-label text-md-right"> Default Doctor</label>
                            <div class="col-md-6">
                                <input id="doctor" type="text" class="form-control{{ $errors->has('doctor') ? ' is-invalid' : '' }}" name="doctor" value="Dr. {{ $patient->doctor->fname }}"  readonly>
                           </div>
                        </div>


                        <div class="form-group row">
                          <label for="Appointment-doctor" class="col-md-4 col-form-label text-md-right"> Select Doctor</label>
                            <div class="col-md-6">
                              <select class="custom-select form-control {{ $errors->has('appointment-doctor') ? ' is-invalid' : '' }}"  name="appointment-doctor" >
                                  <option value="{{$patient->doctor->id}}" selected>Default Doctor  : Dr. {{$patient->doctor->fname}}</option>
                                <option disabled >Select another doctor  </option>

                                @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}">Dr. {{$doctor->fname}}  ({{$doctor->gender}})</option>
                              @endforeach
                              </select>


                           </div>
                        </div>


                        <div class="form-group row">
                          <label for="appointment_date" class="col-md-4 col-form-label text-md-right"> Appointment Date</label>
                            <div class="col-md-6">
                                <input id="appointment_date" type="date" class="form-control{{ $errors->has('appointment_date') ? ' is-invalid' : '' }}" name="appointment_date" value="{{old('appointment_date')}}"  {{($errors->count())? ' required' : ' '}} >

                           </div>
                           <div class="col-md-2">
                             <!-- Button to Open the Modal -->
                             <button type="button" class="btn bg-romany-fade text-warning" data-toggle="modal" data-target="#myModal">
                              View SlotTimes
                             </button>
                           </div>

                        </div>



                      <div class="form-group row ">
                          <label for="start_at" class="col-md-4 col-form-label text-md-right"> Starting at</label>
                        <div class="col-md-6">

                              <input id="start_at" type="time" class="form-control{{ $errors->has('start_at') ? ' is-invalid' : '' }}" name="start_at" value="{{ old('start_at')}}" {{($errors->count())? ' required' : ' '}}  >
                         </div>
                     </div>

                     <!-- <div class="form-group row ">
                          <label for="end_at" class="col-md-4 col-form-label text-md-right"> Ending at</label>
                       <div class="col-md-6">

                             <input id="end_at" type="time" class="form-control{{ $errors->has('end_at') ? ' is-invalid' : '' }}" name="end_at" value="{{ old('end_at')}}" {{($errors->count())? ' required' : ' '}} >
                        </div>
                     </div> -->

                       <input hidden  type="text" name="appointment_refrence" value="">
                       <div class="form-group row ml-0 mt-4">
                         <div class="col-md-12">
                             <a href="{{URL::previous()}}" class="btn btn-outline-danger">
                                 <<- cancel
                             </a>
                             <button type="submit" class="btn btn-info float-right">
                                 Add New Appointment
                             </button>
                           </div>
                       </div>

                     </div>
                   </form>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">

        <h4 class="modal-title text-info text-center"> Doctors SlotTimes

        </h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>

      <!-- Modal body -->
      <div class="modal-body">
         @includeIf('appointments.templates.calendarBlock',[$calendar])
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
