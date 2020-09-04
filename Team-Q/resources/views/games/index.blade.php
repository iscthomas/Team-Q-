@extends('layout')
@section('title','Games')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
            <h2 class='subtitle'>GAMES</h2>
                <a class="games-btn" href="{{ route('games.create') }}"> Create New Game</a>
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
            <th>Game Title</th>
            <th>Category/Genre</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($games as $game)
        <tr>
            <td>{{ $game->name }}</td>
            <td>{{ $game->category }}</td>
            <td>{{ $game->description }}</td>
            <td><img src="{{ URL::to('/') }}{{ $game->image }}" style="max-height:200px"/></td>
            <td>
                <form action="{{ route('games.destroy',$game->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('games.show',$game->id) }}">View</a><br>
    
                    <a class="btn btn-primary" href="{{ route('games.edit',$game->id) }}">Edit</a><br>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $games->links() !!}
      
@endsection