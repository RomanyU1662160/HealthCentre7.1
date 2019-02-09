@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mt-4">
                <div class="card-header bg-romany-fade text-white text-center"> <h4>Login</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Staff_number" class="col-sm-4 col-form-label text-md-right">Staff_number</label>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn  btn-info">
                                    Login
                                </button>


                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-footer">
                  <h5 class="text-muted "> You must be a Staff Memeber to Login</h5>
                  <h6 class="text-muted "> If you have problems to login please , contact the system admin   <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
