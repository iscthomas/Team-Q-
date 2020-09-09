@extends('games.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>View All Games</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('games.create') }}"> Create New Game</a>
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
            <th>Game Title</th>
            <th>Category/Genre</th>
            <th>Description</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($games as $game)
        <tr>
            <td>{{ $game->id }}</td>
            <td>{{ $game->name }}</td>
            <td>{{ $game->category }}</td>
            <td>{{ $game->description }}</td>
            <td><img src="{{ URL::to('/') }}{{ $game->image }}" style="max-height:200px"/></td>
            <td>
                <form action="{{ route('games.destroy',$game->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('games.show',$game->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('games.edit',$game->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Game?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $games->links() !!}
      
@endsection