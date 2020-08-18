@extends('layout')
@section('title','Home')

@section('content')

<div class="flex-center">
    <div class='para'>
        <h2>Recently Added Games</h2>
        <div class='gametile'>
            <h4 class ='gametitle' id='gametitle1'>Game Title Here</h4>
            <img src="images/placeholder.jpg" class='gameimg' id='gameimg1'>
            <a href=''><div class='button'>View Game</div></a>
            <a href=''><div class='button'>Scores</div></a>
        </div>
        <div class='gametile'>
            <h4 class ='gametitle' id='gametitle2'>Game Title Here</h4>
            <img src="images/placeholder.jpg" class='gameimg' id='gameimg2'>
            <a href=''><div class='button'>View Game</div></a>
            <a href=''><div class='button'>Scores</div></a>
        </div>
        <div class='gametile'>
            <h4 class ='gametitle' id='gametitle3'>Game Title Here</h4>
            <img src="images/placeholder.jpg" class='gameimg' id='gameimg3'>
            <a href=''><div class='button'>View Game</div></a>
            <a href=''><div class='button'>Scores</div></a>
        </div>
        <div class='gametile'>
            <h4 class ='gametitle' id='gametitle4'>Game Title Here</h4>
            <img src="images/placeholder.jpg" class='gameimg' id='gameimg4'>
            <a href=''><div class='button'>View Game</div></a>
            <a href=''><div class='button'>Scores</div></a>
        </div>
        <h3><a href="{{url('/games')}}">View All >></a></h3>
    </div>
</div>
<div class='flex-center'>
    <div class='para'>
        <h2>Top Players</h2>
        <div class='playertile'>
            <img src="images/placeholder.jpg" class='playerimg' id='playerimg1'>
            <h4 class ='playertitle' id='playertitle1'>#1 Player Name Here</h4>
            <a href=''><div class='button'>View Profile</div></a>
            <div class='button' id='playerscore1'>Top Score: 7632</div>
        </div>
        <div class='playertile'>
            <img src="images/placeholder.jpg" class='playerimg' id='playerimg1'>
            <h4 class ='playertitle' id='playertitle1'>#2 Player Name Here</h4>
            <a href=''><div class='button'>View Profile</div></a>
            <div class='button' id='playerscore2'>Top Score: 5293</div>
        </div>
        <div class='playertile'>
            <img src="images/placeholder.jpg" class='playerimg' id='playerimg1'>
            <h4 class ='playertitle' id='playertitle1'>#3 Player Name Here</h4>
            <a href=''><div class='button'>View Profile</div></a>
            <div class='button' id='playerscore3'>Top Score: 4998</div>
        </div>
        <h3><a href="{{url('/')}}">View All >></a></h3>
    </div>
</div>
<div class='flex-center'>
    <div class='para'>
        <h2>Top Groups</h2>
        <div class='grouptile'>
            <h4 class = 'grouptitle' id='grouptitle1'>#1 Group Name Here</h4>
            <img src = "images/placeholder.jpg" class='groupimg' id='groupimg1'>
            <a href=''><div class='button'>View Group</div></a>
            <div class='button' id='membercount1'>Members: 20</div>
        </div>
        <div class='grouptile'>
            <h4 class = 'grouptitle' id='grouptitle2'>#2 Group Name Here</h4>
            <img src = "images/placeholder.jpg" class='groupimg' id='groupimg2'>
            <a href=''><div class='button'>View Group</div></a>
            <div class='button' id='membercount2'>Members: 14</div>
        </div>
        <div class='grouptile'>
            <h4 class = 'grouptitle' id='grouptitle3'>#3 Group Name Here</h4>
            <img src = "images/placeholder.jpg" class='groupimg' id='groupimg3'>
            <a href=''><div class='button'>View Group</div></a>
            <div class='button' id='membercount3'>Members: 11</div>
        </div>
    </div>
</div>
@endsection