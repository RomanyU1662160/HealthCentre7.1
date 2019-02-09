
@if(Auth::user()->role->name == "Admin")
  <div class="row card mb-2  ">
    <ul class="nav flex-column nav-pills text-center">
      <li class="nav-item bg-romany-fade text-center card-heading  p-2 rounded border">
          <h3 class="text-white "> Admin Options</h3>
      </li>
      <div class="col-md-10 offset-md-1">
          <li class="nav-item border-bottom ">
            <a class="nav-link{{request()->is('user/show/*')? ' bg-secondary ' : ' '}}" href="{{route('user.page',$user)}}">Details</a>
          </li>
          <li class="nav-item border-bottom ">

            <a class="nav-link {{request()->is('user/profile/update/*')? ' bg-secondary' : ' '}}" href="{{route('user.profile.update',$user)}}"> Update Details   </a>
          </li>
          <li class="nav-item border-bottom">
            <a class="nav-link " href="{{route('user.profile.showAvatar',$user)}}">Upload/Edit Image</a>
          </li>

          <li class="nav-item btn btn-outline-danger mt-3  ">
            <a class="nav-link text-dark " href="{{route('user.showDelete',$user)}}"> Remove User </a>
          </li>
            <p> <small class="text-danger " >This will remove the user and all his details</small></p>

      </div>
  </ul>
</div>
@endif

@if(Auth::user()->role->name == "Doctor")
<div class="row card mb-2  ">
  <ul class="nav flex-column nav-pills text-center">
    <li class="nav-item bg-romany-fade text-center card-heading  p-2 rounded border">
        <h3 class="text-white "> Doctor Options</h3>
    </li>
    <div class="col-md-10 offset-md-1 ">

      <li class="nav-item border-bottom ">
        <a class="nav-link{{request()->is('user/show/*')? ' bg-secondary' : ' '}} " href="{{route('user.page',$user)}}">Details</a>
      </li>
      <li class="nav-item  border-bottom " >
        <a class="nav-link {{request()->is('doctor/Patients/*')? ' bg-secondary text-info' : ''}}  " href="{{route('doctor.patients',$user)}}"  >My Patients </a>
      </li>
      <li class="nav-item border-bottom">
        <a class="nav-link" href="{{route('doctor.calendar',$user)}}  {{(Auth::user()->role->name!= 'Doctor') ? ' disabled' : ' '}}">My Slots </a>
      </li>

        </div>
    </ul>
  </div>
@endif

@if(Auth::user()->role->name == "Receptionist")

    <div class="row card mb-2  ">
      <ul class="nav flex-column nav-pills text-center">
        <li class="nav-item bg-romany-fade text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> Staff Options</h3>
        </li>
        <div class="col-md-10 offset-md-1">
          <li class="nav-item border-bottom ">
            <a class="nav-link{{request()->is('user/show/*')? ' bg-secondary' : ' '}}" href="{{route('user.page',$user)}}">Details</a>
          </li>

          <li class="nav-item border-bottom">
            <a class="nav-link " href="{{route('user.profile.showAvatar',$user)}}">Upload/Edit Image</a>
          </li>

        </div>
        </ul>
      </div>
  @endif
