@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register New User </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="staff_number" class="col-md-4 col-form-label text-md-right">Staff Number</label>

                            <div class="col-md-6">
                                <input id="staff_number" type="text" class="form-control{{ $errors->has('staff_number') ? ' is-invalid' : '' }}" name="staff_number" value="{{ old('staff_number') }}" required autofocus>

                                @if ($errors->has('staff_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('staff_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right"> Role</label>

                          <div class="col-md-6">
                          <select class="form-control" name="role">
                            <option value ='' class="disabled">Select</option>
                            <option value="1">Admin</option>
                            <option value="2">Receptionist</option>
                            <option value="3">Doctor</option>
                          </select>

                            @if ($errors->has('departement'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('departement') }}</strong>
                                </span>
                            @endif

                          </div>
                      </div>





                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
