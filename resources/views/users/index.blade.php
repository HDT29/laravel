@extends('layouts')
@section('title')
 User
@endsection
@section('ii','Users list')
@section('contents')
<a href="{{ route('users.create') }}" class="btn btn-success">Create</a>
    @if(empty($users))
      <p>No Data</p>
    @else
      <table class="table">
        <thead>
          <th>Name</th>
          <th>Birthday</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Role</th>
          <th>Is active</th>
        </thead>
        <tbody>
          @foreach($users as $user)

            <tr>
              <td><a href="{{ route('users.show',['id'=>$user->id]) }}">{{ $user->name }}</td>
              <td>{{ $user->birthday }}</td>
              <td>{{ $user->phone }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td>
                <form method="POST" action="{{ route('users.update',['id'=>$user->id]) }}">
                  @csrf
                  <select name="is_active" onchange="this.form.submit()">
                    <option @if ($user->is_active)
                      selected 
                    @endif value="1">active</option>
                    <option @if (!$user->is_active)
                      selected 
                    @endif value="0">in active</option>
                  </select>
                </form>
              </td>

              <td><a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-primary">Update</a></td>
              <td>
                <form id="form-{{ $user->id }}" method="POST" action="{{ route('users.delete',['id'=>$user->id]) }}">
                  @csrf
                  <button class="btn btn-danger" type="button" onclick="Xoa({{ $user->id }})">Delete</button>
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