@extends('layouts')

@section('contents')
<form action="{{ route('users.store') }}" method="POST" class="col-md-8 col-md-offset-2">
	<div class="form-group">
	@csrf
	<lable for="name"> Name:</lable>
	<input type="text" name="name" placeholder="User ..." class="form-control">
	<br>
	<lable>Birthday:</lable>
	<input type="date" name="birthday" placeholder="Date ..." class="form-control">
	<br>
	<lable>Email:</lable>
	<input type="text" name="email" placeholder="mail.com" class="form-control">
	<br>
	<lable>Phone:</lable>
	<input type="number" name="phone" placeholder="Phone ..." class="form-control">
	<br>
	<button class="btn btn-success" type="submit">Submit</button>
	</div>
</form>
@endsection