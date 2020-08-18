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
                margin: 0;
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
                font-size: 1.2rem;
                padding-top: 35%;
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
                width: 23%;
                height: 400px;
                background-color: whitesmoke;
                margin-top: 20px;
                margin-right: 2%;
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

            .playertitle {
                padding-left: 12%;
                color: #636b6f;
            }

            .playertile {
                width: 31%;
                height:350px;
                background-color: whitesmoke;
                margin-top: 20px;
                margin-right: 2%;
                float: left;
                border-radius: 25px;
            }

            .playerimg {
                padding-bottom: 10px;
                padding-top: 15px;
                width: 68%;
                height: 60%;
                display: block;
                margin: 0 auto;
                border-radius: 50%;
            }

            .groupimg {
                padding-bottom: 25px;
                width: 66%;
                height: 57%;
                display: block;
                margin: 0 auto;
                border-radius: 50%;
            }

            .grouptitle {
                padding-left: 12%;
                color: #636b6f;
            }

            .grouptile {
                width: 30%;
                height:350px;
                background-color: whitesmoke;
                margin-top: 20px;
                margin-right: 3%;
                float: left;
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
                height: 33px;
            }

            .button > a {
                text-decoration: none;
            }
        </style>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Name Pending
                </div>

                <div class="links">
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{url('/games')}}">Games</a>
                    <a href="{{url('/groups')}}">Groups</a>
                    <a href="{{url('/scores')}}">Scores</a>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                
                @yield('content')
            </div>
    </body>
</html>