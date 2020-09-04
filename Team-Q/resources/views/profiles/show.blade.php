@extends('layout')
@section('title','Show profile')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show profile</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('profiles.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $profile->real_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Favourite Games:</strong>
            {{ $profile->favourite_games }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Location:</strong>
            {{ $profile->location }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Location:</strong>
            {{ $profile->location }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>About Me:</strong>
            {{ $profile->about_me }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>avatar:</strong>
            <img src="{{ URL::to('/') }}{{ $profile->avatar }}" style="max-height:400px"/>
        </div>
    </div>
</div>
@endsection