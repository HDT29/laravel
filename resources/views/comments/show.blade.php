@extends('layouts')

@section('contents')
	<p>Create by: {{ $comment->user->name}}</p>
	<p>Content:  {{ $comment->content }}</p>
    <p>Comment To:   {{ $comment->post->title }}</p>
@endsection