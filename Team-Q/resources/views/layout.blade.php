<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!--Link to Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Raleway&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url(images/12491.jpg);
                background-size: 2000px;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                margin-top: 25px;
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

            .header {
                background-image: url(images/12491.jpg);
                background-size: 2000px;
            }

            .layer {
                background-color: black;
                opacity: 70%;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .title {
                padding-left: 10px;
                padding-bottom: 10px;
                color: #272027;
                font-size: 84px;
                font-family: Kanit;
                -webkit-text-stroke-width: 2px;
                -webkit-text-stroke-color: whitesmoke;
            }

            .nav {
                opacity: 70%;
                background-color: black;
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .nav > a {
                color: whitesmoke;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .nav > a:hover {
                color: #E41C24;
            }

            .nav > .spec:hover {
                color: #06A3E1;
            }
        </style>
    </head>
    <body>  
        <div class="header"> 
            <div class="layer">              
                <div class="title">
                    Name Pending
                </div>
            </div>   
        </div>               
        <div class="content">
            <div class="nav">
                <a href="{{url('/home')}}">Home</a>
                <a href="{{url('/games')}}">Games</a>
                <a href="{{url('/groups')}}">Groups</a>
                <a href="{{url('/scores')}}">Scores</a>
                <a href="{{url('/login')}}" class="spec">Log-In</a>
                <a href="{{url('/register')}}" class="spec">Register</a>
            </div>
            @yield('content')
        </div>
    </body>
</html>