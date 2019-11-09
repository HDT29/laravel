@extends('layouts')

@section('contents')
<form action="{{ route('posts.update',['id'=>$post->id]) }}" method="POST" class="col-md-8 col-md-offset-2">
	@csrf
	<label>Title:</label>
	<input type="text" name="title" placeholder="Title ..." class="form-control" value="{{ $post->title}}">
	<br>
	<lable> Content:</lable>
	<input type="text" name="content" placeholder="Content ..." class="form-control" value="{{ $post->content}}">
	<br>
	<lable>Category:</lable>
	<select name="category_id" placeholder="Category ..." class="form-control">
		@foreach ($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
		@endforeach
	</select>
	<button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection