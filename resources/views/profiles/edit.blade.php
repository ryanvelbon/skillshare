@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('centre')
<div class="row">
	<div class="panel panel-default"></div>
		<div class="panel-heading">Edit Profile<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

		<div class="panel-body">

            <form method="post" action="{{ action('UserProfilesController@update') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<label for="bday">Date of Birth</label>
            	<input id="bday" name="bday" type="date">

				<label for="location">Location</label>
				<select class="form-control" name="location" id="location">
					@foreach($locations as $location)
						<option value="{{$location->id}}">{{$location->city}}</option>
					@endforeach
				</select>

				<label for="topic-tags">What topics interest you?</label>
				<input id="topic-tags" name="topics" type="text" value="" />

				<br>

				<label for="skill-tags">What skills do you have?</label>
				<input id="skill-tags" name="skills" type="text" value="" />

				<br>

				<input type="file" name="profile_pic" id="profile_pic">

				<br>

				<input type="hidden" name="_method" value="put" />

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

