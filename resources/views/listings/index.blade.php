@extends('layouts.app')

@section('left')
	@include('inc.filterListings')
@endsection

@section('centre')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Listings</h3>
    </div>
    <div class="panel-body">
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

        @if (session('status'))
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