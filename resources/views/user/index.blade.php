@extends ('layouts.app')
@section('title','All Users ')

@section('content')
<h1 class="text-muted text-center">All Users  List </h1>
<div class="mt-2">
  {{$users->links()}}
@foreach($users as $user)


@include('user.templates.userBlock')


@endforeach
</div>
@endsection
