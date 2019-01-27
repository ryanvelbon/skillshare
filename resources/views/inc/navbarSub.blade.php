<script>
  
</script>


<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Red Pill Skills</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!-- <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li> -->
        <li class="{{Request::is('profiles') ? 'active' : ''}}"><a href="/profiles">Members</a></li>
        <li class="{{Request::is('listings') ? 'active' : ''}}"><a href="/listings">Listings</a></li>
        <li class="{{Request::is('groups') ? 'active' : ''}}"><a href="/groups">Groups</a></li>
        <li class="{{Request::is('events') ? 'active' : ''}}"><a href="/events">Events</a></li>     
      
        <form id="search-form" action="#" accept-charset="UTF-8" method="GET">
          <div id="search" class="input-group input-group-lg">
            <!-- a JS script uses these hidden values to set the action of the form -->
            <div id="action-for-explore" style="display: none;">#</div>
            <div id="action-for-listings" style="display: none;">{{ action('ListingsController@search') }}</div>
            <div id="action-for-members" style="display: none;">{{ action('UserProfilesController@search') }}</div>
            <div id="action-for-groups" style="display: none;">#</div>
            <div id="action-for-events" style="display: none;">#</div>

            <label id="hintsArea" for="search_query"></label>
            <input id="search_query" name="search_query" type="text" class="form-control" autocomplete="off" placeholder="Search" onkeyup="showHint(this.value)">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Explore</a></li>
                    <li><a href="#">Find Listings</a></li>
                    <li><a href="#">Find Members</a></li>
                    <li><a href="#">Find Groups</a></li>
                    <li><a href="#">Find Events</a></li>
                  </ul>
                </div>
              </button>
            </div>
          </div>
        </form>

      </ul>
    </div>
  </div>
</nav>
