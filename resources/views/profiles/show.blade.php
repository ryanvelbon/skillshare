@extends('layouts.app')

@section('content')
<h1>{{ $user->username }}</h1>

<li>{{ $user->profile->city }}</li>
<li>{{ $user->profile->date_of_birth }}</li>

@endsection
