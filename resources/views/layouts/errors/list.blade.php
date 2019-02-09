@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                <li class="border-bottom">{{ $error }}</li>


            @endforeach
        </ul>
    </div>
@endif
