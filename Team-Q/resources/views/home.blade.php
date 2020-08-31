@extends('layout')
@section('title','Home')

@section('content')


<div class='flex-center'>
    <div class='para'>
        <h2>Recently Added Games</h2>
        <?php $games = DB::table('games')->get();?>
            @foreach ($games as $game)
            <div class='gametile'>
                <h4 class ='gametitle'>{{ $game->name }}</h4>
                <img src="{{ URL::to('/') }}{{ $game->image }}" class='gameimg'>
                <a href=''><div class='button'>View Game</div></a>
                <a href=''><div class='button'>Scores</div></a>
            </div>
            @endforeach
            <!--<h3>view all</h3>-->

    </div>
</div>
<div class='flex-center'>
    <div class='para'>
        <h2>Top Players</h2>
        <div class='playertile'>
            <img src="images/placeholder.jpg" class='playerimg' id='playerimg1'>
            <h4 class ='playertitle' id='playertitle1'>#1 Player Name Here</h4>
            <a href=''><div class='button'>View Profile</div></a>

            <div class='disp-button' id='playerscore1'>Top Score: 7632</div>

        </div>
        <div class='playertile'>
            <img src="images/placeholder.jpg" class='playerimg' id='playerimg1'>
            <h4 class ='playertitle' id='playertitle1'>#2 Player Name Here</h4>
            <a href=''><div class='button'>View Profile</div></a>

            <div class='disp-button' id='playerscore2'>Top Score: 5293</div>

        </div>
        <div class='playertile'>
            <img src="images/placeholder.jpg" class='playerimg' id='playerimg1'>
            <h4 class ='playertitle' id='playertitle1'>#3 Player Name Here</h4>
            <a href=''><div class='button'>View Profile</div></a>

            <div class='disp-button' id='playerscore3'>Top Score: 4998</div>
        </div>
        <h3>view all</h3>

    </div>
</div>
<div class='flex-center'>
    <div class='para'>

        <h2>Recently Added Groups</h2>
        <?php $groups = DB::table('group_names')->get();?>
            @foreach ($groups as $group)
            <div class='grouptile'>
                <h4 class ='grouptitle'>{{ $group->group_name }}</h4>
                <img src="{{ URL::to('/') }}{{ $group->image }}" class='groupimg'>
                <a href="{{ route('groups.show', $group->id) }}"><div class='button'>View Group</div></a>
                <div class='disp-button'>Members: 666</div>
            </div>
            @endforeach
            <h3>view all</h3>

    </div>
</div>
@endsection