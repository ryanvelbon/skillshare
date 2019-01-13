@extends('layouts.app')

@section('left')
@endsection

@section('centre')
<h1>{{ $listing->title }}</h1>
<p>{{ $listing->description }}</p>
@endsection

@section('right')
@endsection