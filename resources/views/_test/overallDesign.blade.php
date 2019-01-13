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
        {{--@include('inc.navbar')
        @include('inc.navbarSub')--}}

        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
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

                 <div class="col-md-4 col-lg-4"> <!--LEFT ------------------------------------------------------- -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>My Profile</h3>
                        </div>
                        <div class="panel-body">
                          <div class="panel-group">
                            <div class="panel panel-default">
                              <div class="panel-heading">Events</div>
                              <div class="panel-body">Panel Content</div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">Listings</div>
                              <div class="panel-body">Panel Content</div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">Projects</div>
                              <div class="panel-body">Panel Content</div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">Groups</div>
                              <div class="panel-body">Panel Content</div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">Friends</div>
                              <div class="panel-body">Panel Content</div>
                            </div>
                          </div>
                        </div>
                    </div>
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
