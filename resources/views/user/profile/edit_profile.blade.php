@extends('user.layouts.default')

@section('profile.content')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header bg-romany-fade text-center text-white"> <h5>  Update {{$user->fullname()}}`s Profile </h5>   </div>
<small class="text-muted"> Update your details</small>
                <div class="card-body">
                    <form method="POST" action="{{route('user.profile.update',$user)}}" class="{{($errors->count())? ' was-validated' : ' '}} ">
                        @csrf


                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Title </label>

                            <div class="col-md-6">
                              <select class="form-control" name="title"  {{($errors->count())? ' required' : ' '}} >
                                <option value="" class="disabled">Select</option>
                                <option value="Dr"  {{ ($user->title=='Dr')? ' selected' : old('title') }} >Dr</option>
                                <option value="Mr" {{ ($user->title=='Mr')? ' selected' : old('title') }}>Mr</option>
                                <option value="Mrs" {{ ($user->title=='Mrs')? ' selected' : old('title') }}>Mrs</option>
                                <option value="Miss" {{ ($user->title=='Miss')? ' selected' : old('title') }}>Miss</option>
                            </select>
                          </div>
                      </div>

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{($user->fname)? : old('fname') }}"   {{($errors->count())? ' required' : ' '}} >
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{($user->lname)? : old('lname') }}" {{($errors->count())? ' required' : ' '}} >
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{($user->email)? : old('email') }}" {{($errors->count())? ' required' : ' '}} >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{($user->mobile)? :old('mobile') }}" {{($errors->count())? ' required' : ' '}} >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="house" class="col-md-4 col-form-label text-md-right">House</label>

                            <div class="col-md-6">
                                <input id="house" type="house" class="form-control{{ $errors->has('house') ? ' is-invalid' : '' }}" name="house" value="{{($user->house)? :old('house') }}" {{($errors->count())? ' required' : ' '}} >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ ($user->address)? :old('address') }}" {{($errors->count())? ' required' : ' '}} >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">Postcode</label>

                            <div class="col-md-6">
                                <input id="postcode" type="postcode" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ ($user->postcode)? :old('postcode') }}" {{($errors->count())? ' required' : ' '}} >
                            </div>
                        </div>


                        <div class="form-group row ml-0">
                          <div class="col-md-12">
                              <a href="{{route('user.page',$user)}}" class="btn btn-outline-danger">
                                  <<- cancel
                              </a>
                              <button type="submit" class="btn btn-info float-right">
                                  Update Details
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
