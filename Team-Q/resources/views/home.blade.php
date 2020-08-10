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
@endsection