@extends('layouts.app')

@section('content')
<div class="row">
	<div class="panel panel-default"></div>
		<div class="panel-heading">Add a Listing<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

		<div class="panel-body">

            <form method="post" action="{{ action('ListingsController@store') }}" accept-charset="UTF-8">

            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<label for="skill">What skill are you looking for?</label>
				<select class="form-control" name="skill" id="skill">
					@foreach($skills as $skill)
						<option value="{{$skill->id}}">{{$skill->title}}</option>
					@endforeach
				</select>

				<label for="location">Location</label>
				<select class="form-control" name="location" id="location">
					@foreach($locations as $location)
						<option value="{{$location->id}}">{{$location->city}}</option>
					@endforeach
				</select>

				<label for="title">Title</label>
				<input class="form-control" type="text" name="title" id="title">

				<label for="description">Description</label>
				<textarea class="form-control" type="textbox" name="description" id="description"></textarea>

				<label for="paid">Paid</label>
				<input class="form-control" type="checkbox" name="paid" id="paid">		

				<input type="submit" value="Submit">
            </form>          
        </div>
</div>
@endsection