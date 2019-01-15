@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('centre')
	<input id="tags" type="text" value="Amsterdam,Washington" />
@endsection

@section('scripts')


<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('js/bootstrap3-typeahead.js') }}"></script>

<script type="text/javascript">

$(document).ready(function() {

$('#tags').tagsinput({
	typeahead: {
		source: ['Alabama','Alaska','Arizona','Arkansas','California'],
	},
});

$('#tags').on('itemAdded', function(event) {
	setTimeout(function() {
		$('.bootstrap-tagsinput :input').val('');
	}, 0);
});

});
</script>
@endsection