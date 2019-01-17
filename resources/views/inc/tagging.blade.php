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