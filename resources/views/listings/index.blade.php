@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Latest Listings</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if(count($listings))
        @foreach($listings as $listing)
            <section>
              <div class="container">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="card-block">
                        <h4 class="card-title">Curabitur gravida vestibulum imperdiet.</h4>
                        <p class="card-text">Cras convallis ut turpis vitae facilisis. Morbi eu augue vel quam efficitur rhoncus vitae eget lectus. Cras augue ligula, aliquam ut enim ut, feugiat imperdiet sem. Integer sed mi quis nisl eleifend interdum.</p>
                        <p class="card-text">Cras convallis ut turpis vitae facilisis. Morbi eu augue vel quam efficitur rhoncus vitae eget lectus. Cras augue ligula, aliquam ut enim ut, feugiat imperdiet sem.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('img/listing.png') }}" alt="Card image cap">
                      <div class="card-img-bottom">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        @endforeach
    @else
        <p>No Listings Found</p>
    @endif
</div>
@endsection


<!-- <div class="card flex-md-row mb-4 box-shadow h-md-250">
    <div class="card-body d-flex flex-column align-items-start">
      <strong class="d-inline-block mb-2 text-primary">{{ \App\Skill::findOrFail($listing->skill_id)->title }}</strong>
      <h3 class="mb-0">
        <a class="text-dark" href="#">{{ $listing->title }}</a>
      </h3>
      <div class="mb-1 text-muted">{{ \App\User::findOrFail($listing->user_id)->username }}</div>
      <p class="card-text mb-auto">{{ $listing->description }}</p>
      <a href="#">Continue reading</a>
    </div>
    <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('img/listing.png') }}" alt="Card image cap">
</div> -->









<!-- Wrap everything in BS panel class? -->