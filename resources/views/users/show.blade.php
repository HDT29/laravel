@extends('layouts')

@section('contents')
	<p>Name: {{ $user->name}}</p>
	<p>Birthday:  {{ $user->birthday }}</p>
    <p>Phone:   {{ $user->phone }}</p>
	<p>Email:  {{ $user->email }}</p>
	<p>Role:  {{ $user->role }}</p>
@endsection