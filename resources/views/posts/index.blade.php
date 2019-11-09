@extends('layouts')
@section('title')
 Post
@section('ii','Posts List')
@endsection
@section('contents')
<a href="{{ route('posts.create') }}" class="btn btn-success">Create</a>
    @if(empty($posts))
      <p>No Data</p>
    @else
      <table class="table">
        <thead>
          <th>id</th>
          <th>Title</th>
          <th>Create by</th>
          <th>Content</th>
          <th>Category</th>
        </thead>
        <tbody>
          @foreach($posts as $post)

            <tr>
              <td><a href="{{ route('posts.show',['id'=>$post->id]) }}">{{ $post->title}}</td>
              <td>{{ $post->user->name }}</td>
              <td>{{ $post->content }}</a></td>
              <td>{{ $post->category->name }}</td>

              <td><a href="{{ route('posts.edit',['id'=>$post->id]) }}" class="btn btn-primary">Update</a></td>
              <td>
                <form id="form-{{ $post->id }}" method="POST" action="{{ route('posts.delete',['id'=>$post->id]) }}">
                  @csrf
                  <button class="btn btn-danger" type="button" onclick="Xoa({{ $post->id }})">Delete</button>
                </form>
                <script type="text/javascript">
                  function Xoa(id) {
                    var conf=confirm('bạn có muốn xóa không');
                    if (conf=true) {
                      $('#form-'+id).submit();
                    }
                  }
                </script>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
  <!-- /.content-wrapper -->
@endsection