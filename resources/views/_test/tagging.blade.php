@extends('layouts.app')

@section('centre')
LOL

<input id="zoogoo" type="text" value="Amsterdam,Washington" data-role="tagsinput" />
@endsection

@section('scripts')
<script>
	window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        alert("Yeah!");
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}
</script>

<script src="{{ asset('js/typeahead.bundle.js') }}"></script>
<script>
var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    url: 'assets/citynames.json',
    filter: function(list) {
      return $.map(list, function(cityname) {
        return { name: cityname }; });
    }
  }
});


citynames.initialize();

// $('input').tagsinput({
//   typeaheadjs: {
//     name: 'citynames',
//     displayKey: 'name',
//     valueKey: 'name',
//     source: citynames.ttAdapter()
//   }
// });

$('#zoogoo').tagsinput({
    //options for tagsinput here
}).typeahead({
    source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
});

</script>
@endsection