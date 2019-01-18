<div class="filter-widget panel panel-default">
    <div class="panel-heading">
        <h3>Filtered Search<i class="glyphicon glyphicon-filter"></i></h3>
    </div>
    <div class="panel-body">
    	<form id="search-form" action="{{ action('UserProfilesController@filteredSearch') }}" accept-charset="UTF-8" method="GET">
    		<label for="craft">Craft</label>
			<select class="form-control" name="craft" id="craft">
				<option value="any">Any craft</option>
				@foreach($crafts as $craft)
					<option value="{{$craft->id}}">{{$craft->title}}</option>
				@endforeach
			</select>

			<label for="location">Location</label>
			<select class="form-control" name="location" id="location">
				<option value="any">Anywhere</option>
				@foreach($locations as $location)
					<option value="{{$location->id}}">{{$location->city}}</option>
				@endforeach
			</select>

			<label for="topic-tags">Interests</label>
			<input id="topic-tags" name="topics" type="text" value="" />

			<br>

			<label for="skill-tags">Skills</label>
			<input id="skill-tags" name="skills" type="text" value="" />

			<button type="submit" class="btn btn-default">Submit</button>
    	</form>
    </div>
</div>