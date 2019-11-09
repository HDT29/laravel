@extends('layouts')

@section('contents')
<form action="{{ route('comments.update',['id' => $comment->id]) }}" method="POST" class="col-md-8 col-md-offset-2">
	@csrf
	<lable>Content:</lable>
	<input type="text" name="content" placeholder="Content ..." class="form-control" value="{{ $comment->content}}">
	<br>
	<lable> CommentTo:</lable>
	<select name="post_id" placeholder="Post_id ..." class="form-control">
		@foreach ($posts as $post)
			<option value="{{ $post->id }}">{{ $post->title }}</option>
		@endforeach
	</select>
	<button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection