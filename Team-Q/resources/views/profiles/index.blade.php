@extends('layout')
@section('title','profiles')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
            <h2 class='subtitle'>Users</h2>
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
            <th>Real Name</th>
            <th>Favourite Games</th>
            <th>About Me</th>
            <th>Profile Visibility</th>
            <th>avatar</th>
        </tr>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{ $profile->real_name }}</td>
            <td>{{ $profile->favourite_games }}</td>
            <td>{{ $profile->about_me }}</td>
            <td>{{ $profile->profile_visibility }}</td>
            <td>{{ $profile->avatar }}</td>
            <td><img src="{{ URL::to('/') }}{{ $profile->avatar }}" style="max-height:200px"/></td>
            <td>
                <form action="{{ route('profiles.destroy',$profile->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('profiles.show',$profile->id) }}">View</a><br>
    
                    <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->id) }}">Edit</a><br>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $profiles->links() !!}
      
@endsection