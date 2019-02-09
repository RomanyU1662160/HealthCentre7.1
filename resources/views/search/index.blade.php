


  @extends('layouts.app')

  @section('title', 'Search')

  @section('content')


  <div class=" m-5 p-5 bg-romany-fade">



    <form class="form-inline" action="{{route('search.index')}}" method="post">
  @csrf

        <input  id="search" name = "search" class="form-control col-md-9 " type="text" placeholder="Search" role="search" aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0 ml-2 col-md-2" type="submit"  >Search</button>
    </form>
  </div>


<div class="">


 @if(isset($appointments))

@include('appointments.templates.appointmentBlock')



 @endif

</div>


  @endsection
@section('scripts')



  @endsection
