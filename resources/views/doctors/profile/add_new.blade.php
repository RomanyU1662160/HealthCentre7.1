@extends('layouts.app')
@section('title','New Doctor')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-romany-fade text-center text-white"> <h5> Register New Doctor </h5>   </div>

                <div class="card-body">
                    <form method="POST" action="{{route('doctor.addNew')}}" class="{{($errors->count())? ' was-validated' : ' '}} ">
                        @csrf

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">User Role</label>

                            <div class="col-md-6">
                              <select class="form-control" name="role" vlaue="{{old('role')}}" autofocus  required  >
                                <option value ='' class="disabled">Select</option>
                                <option value="1">Admin</option>
                                <option value="2">Doctor</option>
                                <option value="3">Receptionist</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                              <select class="form-control" name="title"  {{($errors->count())? ' required' : ' '}} >
                                <option value ='' class="disabled">Select</option>
                                <option value="Dr">Dr</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                            </select>
                          </div>
                      </div>

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}"   {{($errors->count())? ' required' : ' '}} >


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" {{($errors->count())? ' required' : ' '}} >


                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" {{($errors->count())? ' required' : ' '}} >


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">Date Of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" {{($errors->count())? ' required' : ' '}} >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" {{($errors->count())? ' required' : ' '}} >


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="house" class="col-md-4 col-form-label text-md-right">House</label>

                            <div class="col-md-6">
                                <input id="house" type="house" class="form-control{{ $errors->has('house') ? ' is-invalid' : '' }}" name="house" value="{{ old('house') }}" {{($errors->count())? ' required' : ' '}} >

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" {{($errors->count())? ' required' : ' '}} >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">Postcode</label>

                            <div class="col-md-6">
                                <input id="postcode" type="postcode" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode') }}" {{($errors->count())? ' required' : ' '}} >


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                              <select class="form-control" name="gender"  {{($errors->count())? ' required' : ' '}} >
                                <option value ='' class="disabled">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                          </div>

                        <input  hidden type="password" name="password" value="">
                        <input  hidden type="text" name="staff_number" value="">
                        <div class="form-group row ml-0">
                          <div class="col-md-12">
                              <a href="#" class="btn btn-outline-danger">
                                  <<- cancel
                              </a>
                              <button type="submit" class="btn btn-info float-right">
                                  Register New User
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
