<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* leaderboard highscores */
            .leaderboard-container{
                border: 2px #000 solid;
                background-color: #000;
                color: #fff;
                width 
            }

            .leaderboard-title{
                font-size: 40px;
            }

            .leaderboard-inner{
                border: 2px #fff solid;
                margin: 50px;
                padding: 10px 25px;
                font-size: 1.5em;
                
            }

            .leaderboard-legend{
                text-transform: uppercase;
                letter-spacing: 10px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">

                <?php $dbdata = DB::table('highscores')->get();?>
                
                <div class="leaderboard-container">
                    <h2 class="leaderboard-title">Highscores Leaderboard</h2>
                    @foreach($dbdata as $datadisplayed)
                    <div class="leaderboard-inner">
                        <p><span class="leaderboard-legend">Player Name:   </span>{{$datadisplayed->name}}</p>
                        <p><span class="leaderboard-legend">Highscore:     </span>{{$datadisplayed->highscore}}</p>
                    </div>
                </div>
                @endforeach



                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                    <a href="http://team-q.test/highscores/leaderboard">High Scores Leaderboard</a>
                </div>
            </div>
        </div>
    </body>
</html>
