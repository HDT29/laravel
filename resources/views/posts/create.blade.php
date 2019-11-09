@extends('layouts')

@section('contents')
<form action="{{ route('posts.store') }}" method="POST" class="col-md-8 col-md-offset-2">
	@csrf
	<label>Title:</label>
	<input type="text" name="title" placeholder="Title ..." class="form-control">
	<br>
	<lable> Content:</lable>
	<input type="text" name="content" placeholder="Content ..." class="form-control">
	<br>
	<lable>Category:</lable>
	<select name="category_id" placeholder="Category ..." class="form-control">
		@foreach ($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
		
		@endforeach
	</select>
	<br>
	<button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection