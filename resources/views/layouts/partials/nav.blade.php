<nav class=" navbar navbar-expand-lg   main-nav " style="background:linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%) ;">
    <div class="container-fluid p-4 mb-3  ">
      <div class=" main-brand">
        <a class="main-brand " href="{{ url('/') }}">
        <h3 class="">Canal West</h3>   <small>Health Center</small>
        </a>
      </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="container ">


              <!-- Right Side Of Navbar -->
              <ul class=" nav nav-pills ">
                  <!-- Authentication Links -->
                  @guest
                      <li class="text-center"><a class="nav-link" href="{{ route('login') }}">Staff Login </a></li>
                      <!-- <li class=""><a class="nav-link" href="{{ route('register') }}">Register</a></li> -->
                  @else

@if(Auth::user()->role->name == 'Admin')
                <!-- Left Side Of Navbar -->

                <li class="nav-item  mr-2  btn btn-outline-romany">
                  <a class="nav-link " href="{{route('user.addNew')}}">ADD New User</a>
                </li>

                <li class="nav-item  mr-2  btn  btn-outline-romany">
                  <a class="nav-link" href="{{route('doctor.index')}}">All Doctors</a>
                </li>

                <li class="nav-item  mr-2  btn  btn-outline-romany">
                  <a class="nav-link" href="{{route('prescription.index')}}">All Prescriptions</a>
                </li>

              <li class="nav-item  mr-2  btn  btn-outline-romany">
                <a class="nav-link" href="{{route('user.index')}}">All Staff</a>
              </li>
@endif

@if(Auth::user()->role->name == 'Receptionist' OR Auth::user()->role->name == 'Admin')
                <li class="nav-item  mr-2  btn btn btn-outline-romany">
                  <a class="nav-link " href="{{route('patient.addNew')}}">Add New Patient</a>
                </li>
@endif

                <li class="nav-item  mr-2  btn btn-outline-romany">
                  <a class="nav-link " href="{{route('appointment.calendar')}}"> Slots calendar</a>
                </li>

                <li class="nav-item  mr-2  btn  btn-outline-romany">
                  <a class="nav-link " href="{{route('patient.index')}}">Find Patient</a>
                </li>


                <li class="nav-item  mr-2  btn  btn-outline-romany">
                  <a class="nav-link" href="{{route('appointment.index')}}">Find Appointment</a>
                </li>

<!-- This nav links is using the searchController   -->
                <!-- <li class="nav-item  mr-2  btn btn-outline-romany">
                  <a class="nav-link " href="{{route('search.ajax')}}">  Search</a>
                </li>

                <li class="nav-item  mr-2  btn btn-outline-romany">
                  <a class="nav-link " href="{{route('search.getTable')}}"> Find patient</a>
                </li>
                <li class="nav-item  mr-2  btn btn-outline-romany">
                  <a class="nav-link " href="{{route('search.appointments')}}"> Find Appointment</a>
                </li> -->
<!-- Inactive Because  I used ajax wit jquery in the controller index() Method -->


  </div>

          <div class=" nav-link nav-item  dropdown ">

              <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->staff_number }} as {{Auth::user()->role->name}}<span class="caret"></span>
              </button>
              <div class="dropdown-menu  rounded " aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-info " href="{{route('user.page',Auth::user())}}">My Profile </a>
                  <div class="dropdown-divider"></div>
@if(Auth::user()->role->name=='Doctor')
                  <a class="dropdown-item text-info" href="{{route('doctor.patients',Auth::user())}}">My Patients </a>
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item text-info" href="{{route('doctor.calendar',Auth::user())}}">My Slots </a>
@endif
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item text-danger " href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              </div>


          @endguest

        </div>
      </ul>

  </div>
</div>
</nav>
