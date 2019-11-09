<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
	<div class="row">
		<div class="col-md-2 offset-1 pt-5 text-right">
			<ul class="navbar-nav sidebar-menu menu">
				@foreach ($categories as $menu)
					<li class="link border border-primary p-1 m-1 bg-primary">
						<a class="text-light" href="{{ route('client.category',['id'=>$menu->id]) }}" class="link">
							{{ $menu->name }}
						</a> 
					</li>
				@endforeach
			</ul>
		</div>
		<div class="col-md-6">
			<div class="row">
					<div class="text-primary text-center col-md-12">
						<i style="font-size: 30px">
							All Post Of {{ $category->name }}
						</i>
					</div>
				@empty ($category->posts)
					<div class="bg-danger text-center">
						không có bài post nào!!!
					</div>
				@else
					@foreach ($category->posts as $post)
						<div class="col-md-12">
							<h1>{{ $post->title }}</h1>
						
							
							<p class="text-justify" style="text-indent: 30px;">{{ $post->content }}</p>
							<i><a href="{{ route('client.singlePost',['id'=>$post->id]) }}" class="text-primary">Xem thêm. . .</a></i>
							<small class="pull-right">{{ $post->created_at->diffForHumans() }} . . .</small>

							<div class="clearfix"></div>
							<div class="float-right"><i>Người đăng: {{ $post->user->name }}</i></div>
							<div class="clearfix"></div>
							<hr style="border-top: 1px dashed gray;">
						</div>

					@endforeach
				@endempty
			</div>
		</div>
	</div>
</body>
</html>