@extends('layouts.app')

@section('left')
	@include('inc.filterProfiles')
@endsection

@section('centre')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Members</h3>
    </div>
    <div class="panel-body">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(count($members))
            @foreach($members as $member)
            <div class="well">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">
                        
                    </strong>
                    <span class="text-muted"><i class="glyphicon glyphicon-map-marker"></i>
                        <em>{{App\Location::find($member->profile->location_id)->city}}</em>
                        <strong>{{App\Location::find($member->profile->location_id)->state}}</strong>
                    </span>
                    <h4 class="mb-0">
                        <a class="text-dark" href="{{ url('/profiles', $member->id) }}">{{$member->username}}</a>
                    </h4>

                    <img height="100" width="100" src="{{asset('storage/profilepics/').'/'.$member->profile->profile_pic}}">

                    @foreach($member->interests as $interest)
                        <span class="label label-warning">{{$interest->title}}</span>
                    @endforeach
                    @foreach($member->skills as $skill)
                        <span class="label label-primary">{{$skill->title}}</span>
                    @endforeach

                    </div>
                </div>
            </div>
          @endforeach
        @else
          <p>No members found.</p>
        @endif
    </div>
</div>
@endsection

@section('right')
@endsection