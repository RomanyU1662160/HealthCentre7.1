


  @extends('layouts.app')

  @section('title', 'Search')

  @section('content')



  <ais-index app-id="{{ config('scout.algolia.id') }}"
             api-key="{{ env('ALGOLIA_SEARCH') }}"
             index-name="contacts">

  	<ais-input placeholder="Search contacts..."></ais-input>

  	<ais-results>
  	   <template scope="{ result }">
  		   <div>
  			   <h1>@{{ result.name }}</h1>
  			   <h4>@{{ result.company }} - @{{ result.state }}</h4>
  			   <ul>
  				   <li>@{{ result.email }}</li>
  			   </ul>
  		   </div>
  	   </template>
  	</ais-results>

  </ais-index>

  @endsection
@section('scripts')

<script  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
</script>

  @endsection
