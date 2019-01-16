@extends('layouts.app')

@section('centre')
	<a href="btn btn-default" href="/">Go Back</a>

	<h1>Edit Profile</h1>
	<!-- any need to pass id with update invocation?? -->
	{!! Form::open(['action' => ['UserProfilesController@update'], 'method' => 'POST']) !!}
		{{ Form::bsDate('date_of_birth', $user->date_of_birth) }}
		{{ Form::bsText('city', $user->profile->city) }}
		{{ Form::hidden('_method', 'PUT') }}
		{{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
	{!! Form::close() !!}
@endsection