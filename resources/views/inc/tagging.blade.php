<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
<!-- <script src="{{ asset('js/bootstrap3-typeahead.js') }}"></script> -->
<!-- bootstrap3-typeahead.js is commented out here as it has instead been included in app.blade.php since the navbar also requires it. -->

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