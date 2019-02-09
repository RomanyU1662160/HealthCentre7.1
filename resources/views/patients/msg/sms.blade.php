@extends('patients.layouts.default')


@section('patient.content')
<h3 class=" text-center text-info">Send a mobile message to {{$patient->fullname()}}!</h3>
    <div class="col-md-8 card offset-md-2 p-2">
      <form action="{{route('patient.sms',$patient)}}" method="POST" role="form">
          @csrf
            <div class="form-group  p-3">
              <label for="mobile">Mobile Number</label>
              <input type="text" class="form-control" id="mobile"  name="mobile" placeholder="Enter a mobile phone number" value=" {{(old('mobile')? : $patient->mobile)}}">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" autofocus>Hello There!</textarea>
            </div>
            <button type="submit" class="btn btn-info">Send Text</button>
          </form>
        </div>

@endsection
