@extends('layouts')
@section('title')
 Categories
 @section('ii','Categories List')
@endsection
@section('contents')
<a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>
    @if(empty($categories))
      <p>No Data</p>
    @else
      <table class="table">
        <thead>
          <th>Create By</th>
          <th>Name Category</th>
        </thead>
        <tbody>
          @foreach($categories as $category)

            <tr>
              <td><a href="{{ route('categories.show',['id'=>$category->id]) }}">{{ $category->user->name}}</td>
              <td>{{ $category->name }}</td>

              <td><a href="{{ route('categories.edit',['id'=>$category->id]) }}" class="btn btn-primary">Update</a></td>
              <td>
                <form id="form-{{ $category->id }}" method="POST" action="{{ route('categories.delete',['id'=>$category->id]) }}">
                  @csrf
                  <button class="btn btn-danger" type="button" onclick="Xoa({{ $category->id }})">Delete</button>
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