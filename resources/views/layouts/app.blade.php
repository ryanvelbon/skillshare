<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    
</head>
<body>
    <div id="app">

        @include('inc.navbar')

        @include('inc.navbarSub')

        <div class="container">
            <div class="row">

                <div class="col-md-2 col-lg-2">
                    @yield('left')
                </div>
                
                <div class="col-md-6 col-lg-6">
                    @include('inc.messages')
                    @yield('centre')
                </div>

                <div class="col-md-4 col-lg-4">
                    @yield('right')
                </div>
            </div>
        </div>
    </div>

    @include('inc.footer')
    
    <!-- Scripts ------------------------------------>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap3-typeahead.js') }}"></script>


    
    <script> //This script is specifically for subnavbar
        var tableName = ""; // passed as url parameter so that server knows which table to query

        $(function(){
            $("#search ul li").click(function(){                

                $("#search .dropdown-toggle").text($(this).text());

                switch($(this).text()){
                    case "Explore":
                        placeholderText = "Search everything";
                        $("#search-form").attr('action', $("#action-for-explore").html());
                        tableName = ""
                        break;
                    case "Find Members":
                        placeholderText = "Name or Username";
                        $("#search-form").attr('action', $("#action-for-members").html());
                        tableName = "users"
                        break;
                    case "Find Listings":
                        placeholderText = "Name or Description";
                        $("#search-form").attr('action', $("#action-for-listings").html());
                        tableName = "listings";
                        break;
                    case "Find Groups":
                        placeholderText = "Name or keyword";
                        $("#search-form").attr('action', $("#action-for-groups").html());
                        tableName = "groups"
                        break;
                    case "Find Events":
                        placeholderText = "Where?";
                        $("#search-form").attr('action', $("#action-for-events").html());
                        tableName = "events"
                        break;
                }

                $("#search input").attr('placeholder', placeholderText);
            });
        });

        function showHint(str) {
            if (str.length < 1) {
                document.getElementById("hintsArea").innerHTML = ""; // temporary
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {

                        var hints = JSON.parse(this.responseText);
                        document.getElementById("hintsArea").innerHTML = hints;

                        // *PENDING* 
                        // On every keyUp event, the search box's typeahead source is updated. But changes are only reflected after next keyUp
                        // $("#search_query").typeahead("destroy");
                        // $("#search_query").typeahead({ source: hints });
                    }
                };
                
                var url = '{{ route("search.hints", ["q" => ":q", "table" => ":table"]) }}';
                url = url.replace(':q', str);
                url = url.replace(':table', tableName);
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        }

    </script>

    @yield('scripts')


</body>
</html>
