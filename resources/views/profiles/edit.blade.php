@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('centre')
<div class="row">
	<div class="panel panel-default"></div>
		<div class="panel-heading">Edit Profile<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

		<div class="panel-body">

            <form name="editForm" 
            		method="post"
            		action="{{ action('UserProfilesController@update') }}"
            		onsubmit="return validateForm()" 
            		accept-charset="UTF-8" 
            		enctype="multipart/form-data">

            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            	<label for="bday">Date of Birth</label>
            	<input id="bday" name="bday" type="date" value="{{$user->profile->date_of_birth}}">

            	<label for="craft">Craft</label>
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

				<label for="bio">Write something about yourself</label>
				<textarea class="form-control" type="textbox" name="bio" id="bio"></textarea>

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
	@include('inc.tagging')
	<script>
		$(document).ready(function() {
			$('#bio').val("{{$user->profile->bio}}");

			var craftID = parseInt("{{ $user->profile->craft_id }}");
		    $("#craft option").each(function(){
		        if($(this).val() == craftID){
		        	$(this).prop('selected',true);
		        }
		    });

		    var locationID = parseInt("{{ $user->profile->location_id }}");
		    $("#location option").each(function(){
		        if($(this).val() == locationID){
		        	$(this).prop('selected',true);
		        }
		    });


			@foreach($user->interests as $interest)
				$('#topic-tags').tagsinput('add', "{{$interest->title}}");
			@endforeach

			@foreach($user->skills as $skill)
				$('#skill-tags').tagsinput('add', "{{$skill->title}}");
			@endforeach

		});


		function validateForm() {
			var bday = new Date(document.forms["editForm"]["bday"].value);

			if (bday.setFullYear(bday.getFullYear()+18) >= new Date()) {
				alert("You must be at least 18");
				return false;
			}

			var bio = document.forms["editForm"]["bio"].value;
			if (bio == "") {
				alert("Bio must be filled out");
				return false;
			}
		}
	</script>
@endsection
