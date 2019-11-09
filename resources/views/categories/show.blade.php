@extends('layouts')

@section('contents')
	<p>Create By: {{ $category->user->name}}</p>
	<p>Name Category:  {{ $category->name }}</p>
@endsection