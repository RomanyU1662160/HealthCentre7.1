@extends('patients.layouts.default')

@section('patient.content')
<div class="card ">

  <div class="text-muted ">
    <h3 class="text-center  bg-romany-fade text-white p-4 "> Update {{$patient->fullname()}}`s Profile </h3>
  </div>

    <div class="col-md-8 offset-md-2" id="newPatient">

        <form class=" {{($errors->count())? ' was-validated' : ' '}} " action="#" method="post">
            @csrf

    <h4 class="form-text "> Personal Details</h4>
          <fieldset class="mb-5">
            <div class="input-group mb-3 ">
                  <div class="input-group-prepend">
                       <span class="input-group-text" id="">Contact Number</span>
                  </div>
                    <input type="text" class="form-control col {{($errors->has('mobile')?' is-invalid':'')}}" name="mobile"  value="{{ ($patient->mobile)?: old('mobile')}}" placeholder="{{$patient->mobile}}" {{($errors->count())? ' required' : ' '}}>

                  <div class="input-group-prepend">
                       <span class="input-group-text" id="">Email @</span>
                  </div>
                    <input type="email" class="form-control col  {{($errors->has('email')?' is-invalid':'')}}" name="email" value="{{($patient->email)?:old('email')}}" placeholder="{{$patient->email}}" {{($errors->count())? ' required' : ' '}}>
              </div>
          </fieldset>

            <fieldset class="mb-5">
                 <h4 class="form-text "> Address</h4>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                       <span class="input-group-text" id="">Postcode</span>
                    </div>
                    <input type="text" class="form-control col {{($errors->has('postcode')?' is-invalid':'')}}" name="postcode" value="{{($patient->postcode)?:old('postcode')}}" placeholder="{{($patient->postcode)}}" {{($errors->count())? ' required' : ' '}} >

                    <div class="input-group-prepend">
                    <span class="input-group-text" id="">House</span>
                  </div>
                  <input  type="text" class="form-control col {{($errors->has('house')?' is-invalid':'')}}" name="house"  value="{{($patient->house)?:old('house')}}"   placeholder="{{$patient->house}}" {{($errors->count())? ' required' : ' '}} >
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="">Address</span>
                </div>
                    <input type="text" class="form-control {{($errors->has('address')?' is-invalid':'')}}" name="address" value="{{($patient->address)?:old('address')}}"   placeholder="{{$patient->address}}"  {{($errors->count())? ' required' : ' '}}>
              </div>

            </fieldset>
          <div class="col-md-12 p-2">
              <a href="{{route('patient.show',$patient)}}" class="btn btn-outline-danger">
                  <<- cancel
              </a>
              <button type="submit" class="btn btn-info float-right">
                Update Profile
              </button>
            </div>

      </div>


</div>


@endsection
