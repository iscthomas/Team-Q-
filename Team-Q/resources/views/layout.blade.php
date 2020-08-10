<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

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
                margin-top: 25px;
                position: relative;
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

            h2 {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .para > h3 {
                font-size: 20px;
                margin-top: 45%;
                margin-bottom: 0;
                margin-left: 90%;
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

            .para {
                width: 70%;
                padding: 25px;
                margin-bottom: 20px;
                background-color: #636b6f;
                border-radius: 25px;
                text-align: left;
                color: whitesmoke;
            }

            .gametitle {
                padding-left: 12%;
                color: #636b6f;
                margin-bottom: 10px;

            }

            .gametile {
                width: 245px;
                height: 400px;
                background-color: whitesmoke;
                margin-top: 20px;
                margin-right: 20px;
                float: left;
                border-radius: 25px;
            }

            .gameimg {
                padding-bottom: 10px;
                width: 80%;
                height: 70%;
                display: block;
                margin: 0 auto;
                border-radius: 25px;
            }

            .button {
                background-color: #636b6f;
                font-size: 15px;
                text-align: center;
                float: left;
                margin-left: 6%;
                line-height: 34px;
                border-radius: 15px;
                width: 40%;
                height: 8%;
            }

            .button > a {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Name Pending
                </div>

                <div class="links">
                    <a href="{{url('/home')}}">Home</a>
                    <a href="{{url('/games')}}">Games</a>
                    <a href="{{url('/groups')}}">Groups</a>
                    <a href="{{url('/scores')}}">Scores</a>
                    <a href="{{url('/login')}}">Log-In</a>
                    <a href="{{url('/register')}}">Register</a>
                </div>
                @yield('content')
            </div>
    </body>
</html>