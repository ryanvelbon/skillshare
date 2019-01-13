<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Acme</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
        <li class="{{Request::is('about') ? 'active' : ''}}"><a href="/about">About</a></li>
        

        <li class="{{Request::is('messages') ? 'active' : ''}}"><a href="/messages">Inbox</a></li>
        <li class="{{Request::is('dashboard/projects') ? 'active' : ''}}"><a href="/dashboard/projects">My Projects</a></li>
        <li class="{{Request::is('events') ? 'active' : ''}}"><a href="/events">Events</a></li>
        <li class="{{Request::is('groups') ? 'active' : ''}}"><a href="/groups">Groups</a></li>
        <a href="/listings/create" class="btn btn-primary navbar-btn" role="button">Add a Listing</a>

      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>