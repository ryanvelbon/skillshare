<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- <link rel="stylesheet" href="/css/app.css"> -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">

        @include('inc.navbar')

        @include('inc.navbarSub')

        <div class="container">
            <div class="row">

                <!-- LEFT COLUMN -->
                <div class="col-md-2 col-lg-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Filters</h3>
                        </div>
                        <div class="panel-body">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Skill Required<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Music</li>
                                    <li><a href="#">Music Production</a></li>
                                    <li><a href="#">Guitar</a></li>
                                    <li><a href="#">Mixing & Mastering</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Video</li>
                                    <li><a href="#">Film Editing</a></li>
                                    <li><a href="#">Animation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- MIDDLE COLUMN----------------------------------------------------------------------- -->
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Listings</h3>
                        </div>
                        <div class="panel-body">
                            <!-- SEARCHBOX LISTINGS -------------------------------------------------------------------------------- -->
                            <div class="well">
                                <h3>Find a Listing</h3>
                                <hr>                                
                                <form>
                                  <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search phrase">
                                    <div class="input-group-btn">
                                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                  </div>
                                </form>
                                <br>

                                
                            </div>

                            <!-- LISTINGS--------------------------------------------------------------------------------------- -->
                            <div class="well">
                                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-primary">Animation</strong><span class="text-muted"><em> Phoenix, AZ</em></span>
                                    <h4 class="mb-0">
                                        <a class="text-dark" href="#">Music Video - Jordan Peterson - Responsibility</a>
                                    </h4>

                                    <span class="text-primary">$500</span>

                                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                    <span class="label label-info">Adobe After Effects</span>
                                    <span class="label label-info">Photoshop</span>
                                    <span class="label label-info">Jordan Peterson</span>
                                    <span class="label label-info">Masculinity</span>
                                    <span class="label label-info">Effects</span>
                                    <span class="label label-info">Photoshop</span>
                                    <span class="label label-info">Jordan Peterson</span>
                                    <span class="label label-info">Masculinity</span>

                                    <br>
                                    <button type="button" class="btn btn-primary pull-right">View Listing</button>
                                    <br>    


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN---------------------------------------------------------------------------- -->
                <div class="col-md-4 col-lg-4">

                    <!-- MY PROFILE ----------------------------------------------------------------------------- -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>My Profile</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#prof_menu1"><i class="glyphicon glyphicon-pushpin"></i></a></li>
                                <li><a data-toggle="tab" href="#prof_menu2"><i class="glyphicon glyphicon-folder-open"></i></a></li>
                                <li><a data-toggle="tab" href="#prof_menu3"><i class="glyphicon glyphicon-calendar"></i></a></li>
                                <li><a data-toggle="tab" href="#prof_menu4"><i class="glyphicon glyphicon-">?</i></a></li>
                                <li><a data-toggle="tab" href="#prof_menu5"><i class="glyphicon glyphicon-">?</i></a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="prof_menu1" class="tab-pane fade in active">
                                    <h3>My Listings</h3>
                                    
                                </div>
                                <div id="prof_menu2" class="tab-pane fade">
                                    <h3>My Collabs</h3>
                                </div>
                                <div id="prof_menu3" class="tab-pane fade">
                                    <h3>My Calendar</h3>
                                </div>
                                <div id="prof_menu4" class="tab-pane fade">
                                    <h3>My Groups</h3>
                                </div>
                                <div id="prof_menu5" class="tab-pane fade">
                                    <h3>Friends</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DISCOVER -------------------------------------------------------------------------------- -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Suggestions</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#disc_menu1"><i class="glyphicon glyphicon-pushpin"></i></a></li>
                                <li><a data-toggle="tab" href="#disc_menu2"><i class="glyphicon glyphicon-folder-open"></i></a></li>
                                <li><a data-toggle="tab" href="#disc_menu3"><i class="glyphicon glyphicon-glass"></i></a></li>
                                <li><a data-toggle="tab" href="#disc_menu4"><i class="glyphicon glyphicon-">?</i></a></li>
                                <li><a data-toggle="tab" href="#disc_menu5"><i class="glyphicon glyphicon-">?</i></a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="disc_menu1" class="tab-pane fade in active">
                                    <h3>Recent Listings</h3>
                                    
                                </div>
                                <div id="disc_menu2" class="tab-pane fade">
                                    <h3>Projects</h3>
                                </div>
                                <div id="disc_menu3" class="tab-pane fade">
                                    <h3>Events</h3>
                                </div>
                                <div id="disc_menu4" class="tab-pane fade">
                                    <h3>Groups</h3>
                                </div>
                                <div id="disc_menu5" class="tab-pane fade">
                                    <h3>Friends</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>

    <footer id="footer" class="text-center">
        <p>Copyright 2019 &copy; Red Pill Skills</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
