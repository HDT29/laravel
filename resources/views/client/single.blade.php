<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
	<div class="col-md-8 offset-2">
		<h1>{{ $post->title }}</h1>
		<p>
			<small class="text-primary">
				<b>
					<i>
						<i class="fa fa-chevron-right"></i>
						<i class="fa fa-chevron-right"></i>
						{{ $post->category->name }}
					</i>
				</b>
			</small>
		</p>
		
		<p class="text-justify" style="text-indent: 30px;">{{ $post->content }}</p>
		<small class="pull-right">{{ $post->created_at->diffForHumans() }}...</small>

		<div class="clearfix"></div>
		<div class="float-right"><i>người đăng: {{ $post->user->name }}</i></div>
		<div class="clearfix"></div>
		<hr style="border-top: 1px dashed gray;">
		@foreach ($post->comments as $comment)
			<div class="row">
				<div class="col-md-10 offset-1">
					<div class="name">
						<b>{{ $comment->user->name }}</b>
					</div>
					<div class="col-md-12 border p-3 text-justify">
						{{ $comment->content }}
					</div>
					<small class="pull-right">{{ $comment->created_at->diffForHumans() }} . . .</small>
				</div>
			</div>
		@endforeach
		<div class="bg-light text-center m-5">Copyright © 2016 Company. All rights reserved.</div>
	</div>
</body>
</html>