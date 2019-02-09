<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>

    <div class=" container ">

            <nav class=" navbar navbar-expand-lg   main-nav  mt-4 " style="background:linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%) ;">
                <div class="container-fluid p-4 mb-3  ">
                  <div class=" main-brand ">
                    <a class="main-brand " href="{{ url('/') }}">
                    <h3 class="text-warning">Canal West</h3>   <small class="text-white ml-4">Health Center</small>
                    </a>
                  </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">


              </ul>

            </div>
        </div>
    </nav>
        <h1 class=" text-center text-info mt-4">Patient Checkin </h1>


        <div class=" m-5 p-5 bg-dark">



          <form class="form-inline" action="{{route('patient.checkin')}}" method="post">
        @csrf

              <input   name = "name" class="form-control col-md-6" type="text" placeholder="First Name or Surename or Patient Number"  value="{{old('name')}}">
              <input   name = "postcode" class="form-control col-md-2 ml-4" type="text" placeholder="Your Post Code" role="search" aria-label="Search" value="{{old('postcode')}}">
              <button class="btn btn-outline-warning my-2 my-sm-0 ml-5 col-md-2" type="submit"  > Check In </button>
          </form>
        </div>
        @include('layouts.errors.list')
      @include('layouts.partials.flashes')
    </div>
  </body>
</html>
