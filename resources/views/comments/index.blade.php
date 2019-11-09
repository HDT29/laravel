<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
  <div class="col-md-10">
    <form action="{{ route('auth.logout') }}" method="POST" class="pull-right">
      @csrf
      <button type="submit" class="btn btn-danger">Đăng xuất</button>
    </form>
  </div>
  <div class="col-md-6 offset-3">
    <div class="row">
      @empty ($posts)
        <div class="bg-danger block">
          không có bài post nào!!!
        </div>
      @else
        @foreach ($posts as $post)
          <div class="col-md-12">
            <h1>{{ $post->title }}</h1>
            <p>
              <small class="text-primary">
                <b>
                  <i>
                    <a href="{{ route('client.category',['id'=>$post->category->id]) }}">
                    <i class="fa fa-chevron-right"></i>
                    <i class="fa fa-chevron-right"></i>
                    {{ $post->category->name }}
                    </a>
                  </i>
                </b>
              </small>
            </p>
            
            <p class="text-justify" style="text-indent: 30px;">{{ $post->content }}</p>
            <i><a href="{{ route('client.singlePost',['id'=>$post->id]) }}" class="text-primary">Xem thêm. . .</a></i>
            <small class="pull-right">{{ $post->created_at->diffForHumans() }}...</small>

            <div class="clearfix"></div>
            <div class="float-right"><i>Người đăng: {{ $post->user->name }}</i></div>
            <div class="clearfix"></div>
            <hr style="border-top: 1px dashed gray;">
          </div>

        @endforeach
        <div>{{ $posts->links() }}</div>
      @endempty
    </div>
    
  </div>
</body>
</html>