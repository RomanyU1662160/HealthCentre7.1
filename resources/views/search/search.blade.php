@extends('layouts.app')


@section('title','Ajax Search')

@section('style')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
  <h3 class="text-info  text-centre"> Search Appointments </h3>
<div class=" ">
 <div class="card card-info mb-">



  <div class="card-body">
<div class="row">


          <input  id="search" name = "search" class="form-control col-md-4 " type="text" placeholder="Search" role="search" aria-label="Search" autocomplete="off">
          <a href="{{route('search.ajax')}}" class="btn btn-info col-md-1 ml-3"> clear</a>
  </div>
  </div>
</div>
                          <table class="table table-bordered table-hover ">

                                <thead class="bg-romany-fade">

                                    <tr>

                                          <th>ID</th>

                                          <th>Refrence</th>

                                          <th>Date</th>

                                          <th>Start_at</th>
                                            <th>Patient</th>

                                    </tr>

                                </thead>

                                <tbody>


                                </tbody>

                          </table>
 </div>


</div>


@endsection

@section('scripts')
<script type="text/javascript">

$('#search').on('keyup',function(){

$value=$(this).val();

$.ajax({

type : 'get',

url : '{{URL::to('search/ajax/appointment')}}',

data:{'search':$value},

success:function(data){

$('tbody').html(data);

}

});



})

</script>
@endsection
