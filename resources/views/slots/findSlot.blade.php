
<form class="" action="#" method="post">
@csrf
          <div class="form-group row">
                    <label for="Appointment-doctor" class="col-md-4 col-form-label text-md-right"> Doctors</label>
                      <div class="col-md-6">
                        <select class="custom-select" id="inputGroupSelect01" name="doctor">
                              <option value="{{$patient->doctor->id}}" selected>Your Doctor  : Dr. {{$patient->doctor->fname}}</option>
                                <div class="border-top">
                                   <option disabled >Choose another doctor</option>
                                </div>
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

     <input type="submit" name="submit" value="Avialable Slots" class="btn btn-success float-right">
 </form>
