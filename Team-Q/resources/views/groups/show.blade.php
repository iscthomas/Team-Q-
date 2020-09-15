@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Group</h2>
        </div>
    </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" style="float:left;margin-right:5vw">
                <img src="{{ URL::to('/') }}{{ $group->image }}" style="max-height:400px"/>
                <br>
                <a class="games-btn btn-primary" href="{{ route('groups.index') }}" style="float:left"> Back</a>
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $group->group_name }}
                <br>
                <strong>Description:</strong>
                {{ $group->description }}
            </div>
        </div>
    </div>
</div>

@endsection