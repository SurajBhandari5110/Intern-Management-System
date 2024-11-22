@extends('layouts.app')
@section('content')
<h1>Welcome, {{ Auth::user()->name }}!</h1>
<h3>Choose a Team Leader:</h3>
<form action="{{ route('intern.assignTL') }}" method="POST">
    @csrf
    <select name="assigned_tl_id" class="form-control">
        @foreach($tls as $tl)
            <option value="{{ $tl->id }}">{{ $tl->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>
@endsection
