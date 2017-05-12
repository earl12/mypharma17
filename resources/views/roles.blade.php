@extends('layouts.master')

@section('contents')
<div class="member-listings-info">
	@foreach($users as $user)
	<p>{{ $user->name }}</p> has a role of {{ $user->role->name }}
	@endforeach
</div>
@endsection
