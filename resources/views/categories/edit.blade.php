@extends('layouts')

@section('contents')
<form action="{{ route('categories.update',['id' => $category->id]) }}" method="POST" class="col-md-8 col-md-offset-2">
	@csrf
	<lable>Name Category:</lable>
	<input type="text" name="name" placeholder="Name Category ..." class="form-control" value="{{ $category->name}}">
	<br>
	<button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection