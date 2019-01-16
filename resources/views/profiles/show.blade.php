@extends('layouts.app')

@section('left')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Tags</h3>
    </div>
    <div class="panel-body">
        @foreach($user->interests as $interest)
            <span class="label label-warning">{{$interest->title}}</span>
        @endforeach
        @foreach($user->skills as $skill)
            <span class="label label-primary">{{$skill->title}}</span>
        @endforeach
    </div>
</div>
@endsection

@section('centre')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>{{ $user->username }}</h3>
		@if(request()->route('id') == Auth::user()->id)
			<a href="/profiles/edit" class="btn btn-primary navbar-btn" role="button">Edit Profile</a>
		@endif
	</div>
	<div class="panel-body">
		
	</div>
</div>
<!-- Listings, Groups, Friends -->
<div class="panel panel-default">
	<div class="panel-heading">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#menu1_goo">Listings</a></li>
			<li><a data-toggle="tab" href="#menu2_goo">Groups</a></li>
			<li><a data-toggle="tab" href="#menu3_goo">Menu 3</a></li>
		</ul>
	</div>
	<div class="panel-body">
		<div class="tab-content">
            <div id="menu1_goo" class="tab-pane fade in active">
              <h3>Listings</h3>
              @foreach($user->listings as $listing)
              	<li><a href="/listings/{{ $listing->id }}">{{$listing->title}}</a></li>
              @endforeach
            </div>
            <div id="menu2_goo" class="tab-pane fade">
              <h3>Groups</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3_goo" class="tab-pane fade">
              <h3>Menu 3</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
          </div>
	</div>
</div>
@endsection