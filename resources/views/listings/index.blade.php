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
                    <strong class="d-inline-block mb-2 text-primary">Animation</strong><span class="text-muted"><i class="glyphicon glyphicon-map-marker"></i><em> Phoenix, AZ</em></span>
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
          @endforeach
        @else
          <p>No listings found.</p>
        @endif
    </div>
</div>
@endsection

@section('right')
@endsection