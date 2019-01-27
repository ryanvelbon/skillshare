@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('left')
	@include('inc.filterListings')
@endsection

@section('centre')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Listings</h3>
        <a href="/listings/create" class="btn btn-primary navbar-btn" role="button">Add a Listing</a>
    </div>
    <div class="panel-body">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(count($listings))
            @foreach($listings as $listing)
            <div class="well">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">
                        {{App\Craft::find($listing->craft_id)->title}}
                    </strong>
                    <span class="text-muted"><i class="glyphicon glyphicon-map-marker"></i>
                        <em>{{App\Location::find($listing->location_id)->city}}</em>
                        <strong>{{App\Location::find($listing->location_id)->state}}</strong>
                    </span>
                    <h4 class="mb-0">
                        <a class="text-dark" href="#">{{$listing->title}}</a>
                    </h4>

                    @if($listing->paid)
                        <span class="label label-success">Paid Work</span>
                    @else
                        <span class="label label-default">Voluntary</span>
                    @endif

                    <p class="card-text mb-auto">{{$listing->description}}</p>

                    @foreach($listing->topics as $topic)
                        <span class="label label-warning">{{$topic->title}}</span>
                    @endforeach
                    @foreach($listing->skills as $skill)
                        <span class="label label-primary">{{$skill->title}}</span>
                    @endforeach

                    <br>
                    <a href="{{ url('/listings', $listing->id) }}" class="btn btn-success btn-lg pull-right">View Listing</a>

                    <br>    


                    </div>
                </div>
            </div>
          @endforeach
        @else
          <p>No listings found.</p>
        @endif
    </div>
</div>
@endsection

@section('right')
@endsection

@section('scripts')
    {{-- @include('inc.tagging') --}}
@endsection