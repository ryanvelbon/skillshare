@extends('layouts.app')

@section('left')
@endsection

@section('centre')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>
@endsection

@section('right')
	@include('inc.myprofile')
	@include('inc.suggestions')
@endsection