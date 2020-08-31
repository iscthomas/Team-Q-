@extends('groups.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>View All Groups</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('groups.create') }}"> Create New Group</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Group Name</th>
            <th>Description</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($groups as $group)
        <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->group_name }}</td>
            <td>{{ $group->description }}</td>
            <td><img src="{{ URL::to('/') }}{{ $group->image }}" style="max-height:200px"/></td>
            <td>
                <form action="{{ route('groups.destroy',$group->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('groups.show',$group->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('groups.edit',$group->id) }}">Edit</a>

                    <a class="btn btn-warning" href="{{ url('/join') $group->id,$user->id }}">Join</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $groups->links() !!}
      
@endsection