@extends('layouts.app')

@section('title','New Patient')

@section('content')
<div class="card">


<hr>
  <div class="text-muted ">
    <h3 class="text-center "> Add New Patient </h3>
  </div>
<hr>
<div class="col-md-6 offset-md-3" id="newPatient">

    <form class=" {{($errors->count())? ' was-validated' : ' '}} " action="{{route('patient.addNew')}}" method="post">
        @csrf

<h5 class="form-text "> Personal Details</h5>
    <fieldset class="mb-5">

          <div class="input-group mb-3 ">

            <div class="input-group-prepend ">
               <span class="input-group-text" id="">First name</span>
            </div>
            <input type="text" class="form-control {{($errors->has('fname')?' is-invalid':'')}}" name="fname" value="{{old('fname')? :''}}" {{($errors->count())? ' required' : ' '}} >
            <div class="input-group-prepend">
               <span class="input-group-text" id=""> last name</span>
            </div>
            <input  type="text" class="form-control {{($errors->has('lname')?' is-invalid':'')}}" name="lname"  value="{{old('lname')}}" {{($errors->count())? ' required' : ' '}}>
         </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text" id="" required >Date Of Birth</span>
          </div>
          <div class="form-control border">
            <input type="date" class=" col-md-4 {{($errors->has('dob')?' is-invalid':'')}}" name="dob"  value="{{old('dob') }}" {{($errors->count())? ' required' : ' '}}>
          </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="">Gender</span>
            </div>
            <div class="border form-control">
            <div class="form-check-inline ml-4 ">
              <input class="form-check-input {{($errors->has('gender')?' is-invalid':'')}}" type="radio" name="gender"  value="Male" value="{{old('gender')}}"  {{($errors->count())? ' required' : ' '}} checked >
              <label class="form-check-label" for="exampleRadios1">Male</label>
            </div>
            <div class="form-check-inline ml-5">
              <input class="form-check-input" type="radio" name="gender"  value="Female">
              <label class="form-check-label" for="exampleRadios2">  Female  </label>
            </div>
          </div>
        </div>
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="">Contact Number</span>
              </div>
              <input type="text" class="form-control col-md-3 {{($errors->has('mobile')?' is-invalid':'')}}" name="mobile"  value="{{old('mobile')}}" {{($errors->count())? ' required' : ' '}}>

            <div class="input-group-prepend">
                 <span class="input-group-text" id="">Email @</span>
              </div>
              <input type="email" class="form-control {{($errors->has('email')?' is-invalid':'')}}" name="email" value="{{old('email')}}" {{($errors->count())? ' required' : ' '}}>
          </div>
    </fieldset>

        <fieldset class="mb-5">
             <h5 class="form-text "> Address</h5>

            <div class="input-group mb-3">

                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Postcode</span>
                </div>
                <input type="text" class="form-control col-md-4 {{($errors->has('postcode')?' is-invalid':'')}}" name="postcode" value="{{old('postcode')}}" {{($errors->count())? ' required' : ' '}} >

                <div class="input-group-prepend">
                <span class="input-group-text" id="">House</span>
              </div>
              <input  type="text" class="form-control col-md-3 {{($errors->has('house')?' is-invalid':'')}}" name="house"  value="{{old('house')}}" {{($errors->count())? ' required' : ' '}}>
          </div>

          <div class="input-group mb-3">


                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Address</span>
                </div>
                <input type="text" class="form-control {{($errors->has('address')?' is-invalid':'')}}" name="address" value="{{old('address')}}" {{($errors->count())? ' required' : ' '}}>
              </div>

        </fieldset>
<hr>
          <fieldset class="mb-5">
             <h5 class="form-text ">Family Doctor </h5>
             <div class="input-group mb-3">

                 <div class="input-group-prepend is-invalid">
                    <span class="input-group-text" id="">Default Doctor </span>
                 </div>

                       <select class="custom-select form-control {{ $errors->has('appointment-doctor') ? ' is-invalid' : '' }}"  name="family-doctor" >

                         <option class="readonly" value= null >Select a  doctor  </option>

                         @foreach($doctors as $doctor)

                         <option value="{{$doctor->id}}">Dr. {{$doctor->fname}}  ({{$doctor->gender}} )</option>
                       @endforeach
                       </select>





              <input hidden type="text" name="patient_number" >
           </div>
<button type="submit" class="btn btn-info float-right mb-5">Add New patient</button>
          </fieldset>
</form>
  </div>


</div>


@endsection
