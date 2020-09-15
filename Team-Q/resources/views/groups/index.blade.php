@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2 class='subtitle'>GROUPS</h2>
                <a class="groups-btn" href="{{ route('groups.create') }}"> Create New Group</a>
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
            <th>Group Name</th>
            <th>Description</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($groups as $group)
        <tr>
            <td>{{ $group->group_name }}</td>
            <td>{{ $group->description }}</td>
            <td><img src="{{ URL::to('/') }}{{ $group->image }}" style="max-height:200px"/></td>
            <td>
                <form action="{{ route('groups.destroy',$group->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('groups.show',$group->id) }}">Show</a><br>
    
                    <a class="btn btn-primary" href="{{ route('groups.edit',$group->id) }}">Edit</a>
            
                    @if ($joined[(($group->id) - 1)] == "true")
                        <a class="btn btn-warning" href="{{ url('/leave', $group->id) }}">Leave</a>
                        <a class="btn btn-success" href="{{ url('/group-highscores/create', $group->id) }}">New highscore  <i class="fas fa-plus" aria-hidden="true"></i></a>
                    @else
                        <a class="btn btn-success" href="{{ url('/join', $group->id) }}">Join</a>
                    @endif

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Group?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $groups->links() !!}
      
@endsection