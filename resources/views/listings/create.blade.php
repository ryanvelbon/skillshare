@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('centre')
<div class="row">
	<div class="panel panel-default"></div>
		<div class="panel-heading">Add a Listing<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

		<div class="panel-body">

            <form method="post" action="{{ action('ListingsController@store') }}" accept-charset="UTF-8">

            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<label for="craft">What craft are you looking for?</label>
				<select class="form-control" name="craft" id="craft">
					@foreach($crafts as $craft)
						<option value="{{$craft->id}}">{{$craft->title}}</option>
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

				<label for="topic-tags">Topics</label>
				<input id="topic-tags" name="topics" type="text" value="" />

				<br>

				<label for="skill-tags">Skills Required</label>
				<input id="skill-tags" name="skills" type="text" value="" />

				<br>

				<label for="paid">Paid</label>
				<input class="form-control" type="checkbox" name="paid" id="paid">



				<input type="submit" value="Submit">
            </form>          
        </div>
</div>
@endsection

@section('scripts')


<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('js/bootstrap3-typeahead.js') }}"></script>

<script type="text/javascript">

$(document).ready(function() {

	var topics = [
		@foreach($topics as $topic)
			"{{$topic->title}}",
		@endforeach
	];

	$('#topic-tags').tagsinput({
		typeahead: {
			source: topics,
		},
	});

	$('#topic-tags').on('itemAdded', function(event) {
		setTimeout(function() {
			$('.bootstrap-tagsinput :input').val('');
		}, 0);
	});

	// Same as above but for skills

	var skills = [
		@foreach($skills as $skill)
			"{{$skill->title}}",
		@endforeach
	];

	$('#skill-tags').tagsinput({
		typeahead: {
			source: skills,
		},
	});

	$('#skill-tags').on('itemAdded', function(event) {
		setTimeout(function() {
			$('.bootstrap-tagsinput :input').val('');
		}, 0);
	});

});
</script>
@endsection