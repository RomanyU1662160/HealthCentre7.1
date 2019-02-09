@if(! $appointments->count())
<div class=" mt-5">
  <h4 class="text-center text-muted"> {{$patient->fullname()}} has no appointemnts. </h4>
</div>

@endif

{{$appointments->links()}}
<table class="table table-striped table-hover ">
  <thead class="bg-romany-fade rounded">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col"></th>
      <th scope="col">Status</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Doctor</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
    <tbody>

    @foreach( $appointments as $appointment)

        <tr>
          <th scope="row">{{$x++}}</th>
          <td>{{$appointment->date->format('D, d- M -Y')}} </td>
          <td><small class="text-muted"> {{$appointment->date->diffForHumans()}}</small> </td>
          <td>Stauts</td>
          <td>{{$appointment->start_at}}</td>
          <td>{{$appointment->end_at}}</td>
          <td>{{$appointment->doctor->fname}}</td>
          <td><small class="text-muted"> {{$appointment->created_at->format('D,d-M-Y')}}</small> </td>
          <td><small class="text-muted"> {{$appointment->updated_at->diffForHumans()}}</small> </td>
          <td>
              <a href="#" class="btn btn-sm btn-outline-info{{($appointment->status=='passed')? ' disabled': ''}}">Edit</a>
              <a href="#" class="btn btn-sm btn-outline-success">View</a>
              <a href="#" class="btn btn-sm btn-outline-danger {{($appointment->status=='passed')? ' disabled': ''}}">Delete</a>

            </td>
        </tr>


    @endforeach
    </tbody>
</table>
