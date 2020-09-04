@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New profile</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('profiles.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="real_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control" placeholder="Location">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Favourite Games:</strong>
                <textarea class="form-control" name="favourite_games" placeholder="Favourite Games"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>About Me:</strong>
                <textarea class="form-control" style="height:150px" name="about_me" placeholder="About Me"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Profile Visibilty:</strong>
                <input type="radio" id="Visible" name="profile_visibility" value="1">
                <label for="hidden">Visible</label><br>
                <input type="radio" id="Hidden" name="profile_visibility" value="0">
                <label for="hidden">Hidden</label><br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image (Max 2MB):</strong>
                <input id="avatar" type="file" class="form-control" name="avatar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        </div>
    </div>

</form>
@endsection