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
   
   @php
        $min = 0;
        $max = count($groups_list);
        $index = ($max - 1);
   @endphp

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
            
                <?php
                    $joined = array_fill($min, $max, "false");
                    
                    if ($max > 0) {
                        for ($i = 0; $i < $max; $i++) { 
                            if (($group->id == $groups_list[$i]->group_id) && ($user_id == $groups_list[$i]->user_id)) {
                                $joined[$i] = "true";
                            }
                            echo($joined[$i]);
                        }
                    }
                ?>
                    {{ $group->id }}

                    @if ($index > $min)
                        @if ($joined[$index-1] == "true")
                            <a class="btn btn-warning" href="{{ url('/leave', $group->id) }}">Leave</a>
                        @else
                            <a class="btn btn-success" href="{{ url('/join', $group->id) }}">Join</a>
                        @endif

                        @php
                            $index++
                        @endphp
                    @else
                        <a class="btn btn-danger" href="{{ url('/join', $group->id) }}">Join</a>
                    @endif

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