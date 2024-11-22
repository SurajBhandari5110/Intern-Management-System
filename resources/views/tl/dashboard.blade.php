@extends('layouts.app')
@section('content')
<h1>Welcome, {{ Auth::user()->name }}!</h1>
<h3>Your Interns:</h3>
<ul>
    @foreach($interns as $intern)
        <li>{{ $intern->name }} - {{ $intern->skill_set }}</li>
    @endforeach
</ul>
@endsection
