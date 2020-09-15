@extends('layout')
@section('title','Show Game')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
    </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" style="float:left;margin-right:5vw">
                <img src="{{ URL::to('/') }}{{ $game->image }}" style="max-height:400px"/>
                <br>
                <a class="games-btn btn-primary" href="{{ route('games.index') }}" style="float:left"> Back</a>
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $game->name }}
                <br>
                <strong>Category/Genre:</strong>
                {{ $game->category }}
                <br>
                <strong>Description:</strong>
                {{ $game->description }}<br>
            </div>
        </div>
    </div>
</div>
@endsection