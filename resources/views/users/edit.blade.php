@extends('layouts')

@section('contents')
<form action="{{ route('users.update',['id' => $user->id]) }}" method="POST" class="col-md-8 col-md-offset-2">
	<div class="form-group">
	@csrf
	<lable for="name"> Name:</lable>
	<input type="text" name="name" placeholder="User ..." class="form-control" value="{{ $user->name}}">
	<br>
	<lable>Birthday:</lable>
	<input type="date" name="birthday" placeholder="Date ..." class="form-control" value="{{ $user->birthday}}">
	<br>
	<lable>Email:</lable>
	<input type="text" name="email" placeholder="mail.com" class="form-control" value="{{ $user->email}}">
	<br>
	<lable>Phone:</lable>
	<input type="number" name="phone" placeholder="Phone ..." class="form-control" value="{{ $user->phone}}">
	<br>
	<button class="btn btn-success" type="submit">Submit</button>
	</div>
</form>
@endsection