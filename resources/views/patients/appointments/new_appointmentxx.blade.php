@extends('patients.layouts.default')
@section('title','New Patient')
@section('patient.content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                          <label for="Appointment-doctor" class="col-md-4 col-form-label text-md-right"> Doctor</label>
                            <div class="col-md-6">
                                <input id="appointment-doctor" type="text" class="form-control{{ $errors->has('Appointment-doctor') ? ' is-invalid' : '' }}" name="appointment-doctor" value="{{ $doctor->fname }}" }} readonly>

                           </div>
                        </div>




                        <div class="form-group row">
                          <label for="appointment_date" class="col-md-4 col-form-label text-md-right"> Appointment Date</label>
                            <div class="col-md-6">
                                <input id="appointment_date" type="date" class="form-control{{ $errors->has('appointment_date') ? ' is-invalid' : '' }}" name="appointment_date" value="{{$date}}"  {{($errors->count())? ' required' : ' '}}  readonly>
                           </div>
                        </div>

  <div class="form-group row ">
        <label for="appointment_date" class="col-md-4 col-form-label text-md-right">Avilable slots</label>
          <div class="col-md-6">
      <select class="" name="slots">
        <option value=""> Select Slot time</option>
        @if(isset($slots))
        @foreach($slots as $slot)
        <option value="{{$slot->id}}">  {{$slot->start_at}} :   {{$slot->end_at}}</option>

        @endforeach
        @endif
      </select>
</div>

   </div>

                        <div class="form-group row ">
                            <label for="start_at" class="col-md-4 col-form-label text-md-right"> Starting at</label>
                          <div class="col-md-6">

                                <input id="start_at" type="time" class="form-control{{ $errors->has('start_at') ? ' is-invalid' : '' }}" name="start_at" value="{{ old('start_at')}}" {{($errors->count())? ' required' : ' '}}  >
                           </div>
                       </div>

                       <div class="form-group row ">
                            <label for="end_at" class="col-md-4 col-form-label text-md-right"> Ending at</label>
                         <div class="col-md-6">

                               <input id="end_at" type="time" class="form-control{{ $errors->has('end_at') ? ' is-invalid' : '' }}" name="end_at" value="{{ old('end_at')}}" {{($errors->count())? ' required' : ' '}} >
                          </div>
                       </div>
                       <input hidden  type="text" name="appointment_refrence" value="">
                       <div class="form-group row ml-0">
                         <div class="col-md-12">
                             <a href="{{route('patient.showSlotsForm',$patient)}}" class="btn btn-outline-danger">
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
@endsection
