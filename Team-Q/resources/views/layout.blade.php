<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Styles -->
        <style>
            :root {
                --cblue: #00acee; /*rgb(0, 172, 238)*/
                --cred: #e61b22; /*rgb(230, 27, 34)*/
            }

            html, body {
                background-image: url(images/12491.jpg);
                background-size: 100vw;
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
                font-size: 10vw;
                color: #272027;
                -webkit-text-stroke-width: 1px;
                -webkit-text-stroke-color: whitesmoke;
            }

            .layer {
                background-color: rgba(20,20,20, 0.7);
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .para > h2 {
                font-size: 2.6vw;
                margin-bottom: 5px;
            }

            .para > h3 {
                font-size: 2vw;
                padding-top: 1vw;
                margin-bottom: 0;
                margin-left: 90%;
            }

            .para > h3:hover {
                color: var(--cblue);
            }

            .links {
                padding-bottom: 10px;
            }

            .links > a {
                color: whitesmoke;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 400;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
                text-decoration: none;
                color: var(--cblue);
            }
            
            .m-b-md {
                margin-bottom: 30px;
            }

            .para {
                width: 85vw;
                height: 37vw;
                padding-left: 25px;
                padding-right: 25px;
                padding-top: 25px;
                margin-bottom: 20px;
                background-color: rgba(20,20,20, 0.7);
                border-radius: 25px;
                text-align: left;
                color: whitesmoke;
                position: relative;
                z-index: 0;
            }

            .gametitle {
                padding-left: 12%;
                font-size: 1.2vw;
                color: whitesmoke;
                margin-top: 7px;
            }

            .gametile {
                width: 23%;
                height: 25vw;
                position: relative;
                z-index: 1;
                background-color: rgba(255, 255, 255, 0.1);
                margin-top: 10px;
                margin-right: 2%;
                float: left;
                border-radius: 25px;
                padding-bottom: 2vh;
            }

            .gameimg {
                padding-top: .1vw;
                padding-bottom: 5px;
                margin-bottom: 1vw;
                width: 12vw;
                height: 18vw;
                display: block;
                margin: 0 auto;
                z-index: 2;
                border-radius: 25px;
            }

            .playertitle {
                padding-left: 1.5vw;
                padding-bottom: .5vw;
                color: whitesmoke;
                font-size: 2vw;
            }

            .playertile {
                width: 31%;
                height: 25vw;
                position: relative;
                z-index: 1;
                background-color: rgba(255, 255, 255, 0.1);
                margin-top: 10px;
                margin-right: 2%;
                float: left;
                border-radius: 25px;
                padding-bottom: 2vh;
            }

            .playerimg {
                padding-bottom: 1.5vh;
                padding-top: 1.5vh;
                width: 14.5vw;
                height: 16vw;
                display: block;
                margin: 0 auto;
                border-radius: 50%;
            }

            .groupimg {

                padding-bottom: 1vh;
                padding-top: 1vh;
                width: 13vw;
                height: 14vw;
                display: block;
                margin: 0 auto;
                border-radius: 50%;
            }

            .grouptitle {
                padding-left: 12%;
                color: whitesmoke;
                padding-top: 2vh;
                font-size: 1.8vw;
            }

            .grouptile {
                width: 31%;
                height: 23vw;
                position: relative;
                z-index: 1;
                background-color: rgba(255, 255, 255, 0.1);
                margin-top: 10px;
                margin-right: 2%;
                float: left;
                border-radius: 25px;
                padding-bottom: 2vh;
            }

            .button, .disp-button {
                background-color: rgba(200, 200, 200, 0.2);
                display: flex;
                text-align: center;
                float: left;
                margin-left: 6%;
                border-radius: 15px;
                width: 40%;
                height: 2.5vw;
                z-index: 2;
                text-decoration: none;
                display: block;
                font-size: 1.1vw;
                font-weight: 450;
                color: whitesmoke;
                padding-top: .38vw;
            }

            .button:hover {
                background-color: rgba(230, 27, 34, 0.3);
            }

            .disp-button {
                background-color: rgba(0, 172, 238, 0.3);

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
                <div class ="layer">
                    <div class="title m-b-md">
                        Name Pending
                    </div>
                

                <div class="links">
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{url('/games')}}">Games</a>
                    <a href="{{url('/games')}}">Players</a>
                    <a href="{{url('/groups')}}">Groups</a>
                    <a href="{{url('/scores')}}">Scores</a>
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

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
                </div>

                
                @yield('content')
            </div>
    </body>
</html>