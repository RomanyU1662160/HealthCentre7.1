<div class="container ">
  <div class="row justify-content-center">
      <div class="col-md-12 m-4">
        <div class="card ">
          <div class="card-header bg-romany-fade text-center text-warning">
            <h3 class="">   Refrence: <small class="text-white">{{$appointment->refrence}} </small> </h3>
         </div>
         <h3 class="text-center text-info"> Appointment Details</h3>
<div class="card-body">
<div class=" row mt-5">
  <div class="col-md-4">

      <img class=" bg-romany-fade rounded-circle border ml-5" src="{{$appointment->patient-> avatar()}}" alt=" patient image" style="width:150px; height:150px;">
      <p class=" text-info">Patient : {{$appointment->patient->fname}}</p>

  </div>
  <div class="col-md-7 offset-md-1">

    <table class="table table-sm border-bottom">

     <tr>
      <th class=" text-info"> Patient: </th>
      <td> <p>  {{$appointment->patient->fname}} {{$appointment->patient->lname}} </p></td>
     </tr>

     <tr>
      <th   class=" text-info" > Doctor: </th>
      <td><p>  Dr {{$appointment->doctor->fname}} </p></td>
     </tr>
     <tr >
      <th  class=" text-info"> Prescription: </th>
       <td>

        @if($appointment_drugs)
          @foreach($appointment_drugs as $drug)

          <ul>
            <li>{{$drug->name}}</li>
          </ul>

          @endforeach

        @else
        <p class="text-muted"> No prescription issued</p>

        @endif
</td>

    </tr>
      <tr >
       <th  class=" text-info" > Notes: </th>
       @if($appointment->notes)
    <td>{{ $appointment->notes}}</td>
    @else
    <td> <p class="text-muted">  No notes for this appointment </span> </p>
    @endif
    </tr>

    </table>
  <a href="{{URL::previous()}}" class="btn btn-secondary float-left "> Back </a>


  <!-- doctors only -->
<span class="d-inline-block " data-toggle="popover" data-title=" Doctors only " data-content=" You must be a doctor to perform this action">

<a href="#" class="btn bg-romany-fade float-right ml-2 text-warning {{(Auth::user()->role->name=='Admin'Or Auth::user()->role->name == 'Receptionist') ? ' disabled' : ' '}}" data-toggle="modal" data-target="#notes_form"  >Add Doctor Notes </a>



<a href="#"  class="btn bg-romany-fade float-right ml-2 text-warning {{(Auth::user()->role->name=='Admin' Or Auth::user()->role->name == 'Receptionist') ? ' disabled' : ' '}}" data-toggle="modal" data-target="#prescription_form" > Add Prescritpion</a>
<a href="{{route('patient.show',$appointment->patient)}}"  class="btn bg-romany-fade float-right ml-2 text-warning"  > Patient History </a>

</span>

        </div>
      </div>
    </div>
  </div>
 </div>
</div>

<!-- Prescription Form Modal -->
<div class="modal fade" id="prescription_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">Add Prescription </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('prescription.addNew',$appointment)}}" class="{{($errors->count())? ' was-validated' : ' '}} " name="drugs">
            @csrf

<!-- Select Drug1 -->
            <div class="form-group row">
                <label for="patient_name" class="col-md-4 col-form-label text-md-right">Drug 1 </label>
                <div class="col-md-6">

                <select class="form-control{{ $errors->has('drug1') ? ' is-invalid' : '' }}" name="drug1"  {{($errors->count())? ' required' : ' '}}>
                  <option value=''  readonly> Select Drug </option>
                  @foreach($drugs as $drug )
                  <option value="{{$drug->id}}"> {{$drug->name}}</option>
                  @endforeach
                </select>
                </div>
            </div>
<!-- Select Drug2 -->
            <div class="form-group row">
                <label for="patient_name" class="col-md-4 col-form-label text-md-right">Drug 2 </label>
                <div class="col-md-6">


                <select class="form-control{{ $errors->has('drug1') ? ' is-invalid' : '' }}" name="drug2" }}>
                  <option value=''  readonly > Select Drug </option>
                  @foreach($drugs as $drug )
                  <option value="{{$drug->id}}"> {{$drug->name}}</option>
                  @endforeach
                </select>
                </div>
            </div>
<!-- Select Drug3 -->
                <div class="form-group row">
                    <label for="patient_name" class="col-md-4 col-form-label text-md-right">Drug 3 </label>
                    <div class="col-md-6">

                    <select class="form-control{{ $errors->has('drug1') ? ' is-invalid' : '' }}" name="drug3" >
                      <option value='' readonly> Select Drug </option>
                      @foreach($drugs as $drug )
                      <option value="{{$drug->id}}"> {{$drug->name}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info float-right">Submit Prescription</button>
</form>

      </div>



    </div>
  </div>
</div>



<!-- Notes Form Modal -->
<div class="modal fade" id="notes_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">Appointment Outcome </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="{{($errors->count())? ' was-validated' : ' '}} " action="{{route('appointment.addNotes',$appointment)}}" method="post" name="notes">
          @csrf
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Add Notes </label>
              <textarea class="form-control" name="notes" rows="5"   {{($errors->count())? ' required' : ' '}}> </textarea>
              <!-- <a href="{{route('appointment.addNotes',$appointment)}}" role="submit" type="submit"> Add Note </a> -->
              <!-- <button type="submit" name="button"> Add Note</button> -->
           </div>


      </div>
      <div class="modal-footer">
        <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="button" class="btn btn-info">Add Notes</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Javascript to show the pop over -->
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
  $('#example').popover(options)
</script>
