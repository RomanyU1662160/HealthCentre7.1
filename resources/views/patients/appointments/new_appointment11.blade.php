@extends('patients.layouts.default')
@section('title','New Appointment')
@section('patient.content')




<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-romany-fade text-center text-white"> <h5> New Appointment </h5>  {{$patient->fullName()}}   </div>

                <div class="card-body">
                    <form method="POST" action="{{route('doctor.searchSlot')}}" class="{{($errors->count())? ' was-validated' : ' '}} ">
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


                           <!-- Button to Open the Modal -->

                           <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal">
                             Check Slots
                           </button>





                                             <!-- The Modal -->

                                             <div class="modal fade" id="myModal">
                                               <div class="modal-dialog modal-dialog-centered">
                                                 <div class="modal-content">

                                                   <!-- Modal Header -->
                                                   <div class="modal-header">
                                                     <h4 class="modal-title">Find a Slot Time</h4>
                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   </div>

                                                   <!-- Modal body -->
                                                   <div class="modal-body">


                                                     <div class="form-group row">
                                                       <label for="Appointment-doctor" class="col-md-4 col-form-label text-md-right"> Doctors</label>
                                                         <div class="col-md-6">
                                                           <select class="custom-select" id="inputGroupSelect01" name="doctor">
                                                               <option value="{{$patient->doctor->id}}"  selected>Your Doctor  : Dr. {{$patient->doctor->fname}}</option>
                                                             <option disabled  class="text-primary">Select another doctor</option>

                                                             @foreach($doctors as $doctor)
                                                             <option value="{{$doctor->id}}">Dr. {{$doctor->fname}}  ({{$doctor->gender}})</option>
                                                           @endforeach
                                                           </select>


                                                        </div>
                                                     </div>

                                                     <div class="form-group row">
                                                                 <label for="appointment_date" class="col-md-4 col-form-label text-md-right"> Appointment Date</label>
                                                                   <div class="col-md-6">
                                                                       <input id="appointment_date" type="date" class="form-control{{ $errors->has('appointment_date') ? ' is-invalid' : '' }}" name="date" value="{{old('appointment_date')}}"  {{($errors->count())? ' required' : ' '}} >
                                                                  </div>
                                                  </div>


                                                   </div>


                                                   <!-- Modal footer -->
                                                   <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info float-right" >Find Slots</button>
                                                   </div>

                                                 </div>
                                               </div>
                                             </div>


                     </div>
                   </form>



            </div>
        </div>
    </div>
</div>
@if(isset($selectedDoctor))
{{$selectedDoctor->fname}}
@endif


@if(isset($slots))
{{dd($slots)}}
<div class="card bg-secondary">
  @foreach($slots as $slot)
 @include('slots.templates.slotBlock')
  @endforeach
</div>
</div>

@else
<p>Please Select a Slot </p>

@endif
@endsection
