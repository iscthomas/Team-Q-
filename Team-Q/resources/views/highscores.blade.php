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
                margin: 0;
            }

            .full-height {
                /* height: 100vh; */
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

            
        <!--DROP DOWN   -->
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}" defer></script>

            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Query Search Through Database Highscore fields -->
            <?php
            if(isset($_POST['search']))
                {
                    $valueToSearch = $_POST['valueToSearch'];
                    // search in all table columns
                    // using concat mysql function
                    $query = "SELECT * FROM `highscores` WHERE CONCAT(`id`, `name`, `highscore`) LIKE '%".$valueToSearch."%'";
                    $search_result = filterTable($query);
                    
                }
                else {
                    $query = "SELECT * FROM `highscores`";
                    $search_result = filterTable($query);
                }

                // function to connect and execute the query
                function filterTable($query)
                {
                    $conn = mysqli_connect("202.49.5.169", "in710shared", "P@ssw0rd", "in710shared_swe_q#");
                    
                    $filter_Result = mysqli_query($conn, $query);
                    return $filter_Result;
                }
            ?>  

        <!-- Adding User Highscore Functionality-->
                
        <?php
                if(isset($_POST['add'])){

                    // if values are in
                    if(isset($_POST['valueToAddName']) && ($_POST['valueToAddHighscore']) && ($_POST['valueToAddRanking']))
                    {
                        $conn= mysqli_connect("202.49.5.169", "in710shared", "P@ssw0rd", "in710shared_swe_q#");
                        // Check if connected
                        if($conn === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        
                        $valueToAddName = $_POST['valueToAddName'];
                        $valueToAddHighscore = $_POST['valueToAddHighscore'];
                        $valueToAddRanking = $_POST['valueToAddRanking'];
                        
                        // Insert values into database through connection 
                        $insert = "INSERT INTO highscores (`name`, `highscore`, `ranking`) VALUES ('$valueToAddName', '$valueToAddHighscore', '$valueToAddRanking')";
                        $added_Result = mysqli_query($conn, $insert);
                        return $added_Result;
                    }
                    else{
                        echo "<p>Please insert all values before continueing to add a player</p>";
                    }
                }
                ?>

       

            <div class="content">

                <?php $dbdata = DB::table('highscores')->get();?>
                
                <div class="leaderboard-container">
                    <h2 class="leaderboard-title">Highscores Leaderboard</h2>
                    <form class="leaderboard-search" action="leaderboard"  method="POST">
                        @csrf
                            <label>Search Player</label>
                            <input type="text" name="valueToSearch" ></input>
                            <input type="submit" name="search" value="Search"></input>
                    </form>
                    <h2 name="valueToSearch">Searching for:  {{ $valueToSearch ?? '' }}</h2> 

                    <?php while($row = mysqli_fetch_array($search_result)):?>
                        <div class="leaderboard-inner">
                            <p><span class="leaderboard-legend">ID:   </span><?php echo $row['id'];?></p>
                            <p><span class="leaderboard-legend">Player Name:   </span><?php echo $row['name'];?></p>
                            <p><span class="leaderboard-legend">Highscore:   </span><?php echo $row['highscore'];?></p>
                        </div>
                    <?php endwhile;?>
                    <br/>

                    <h2>Add a Player to the highscores leaderboard</h2>
                    <form class="leaderboard-search" action="leaderboard"  method="POST">
                        @csrf
                            <label>Player Name: </label>
                            <input type="text" name="valueToAddName"></input>
                            <label>Highscore: </label>
                            <input type="text" name="valueToAddHighscore"></input>
                            <label>Ranking: </label>
                            <input type="text" name="valueToAddRanking"></input>
                            <input type="submit" name="add" value="Add"></input>
                            
                    </form>
                
                </div>



                <div class="links">
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{url('/games')}}">Games</a>
                    <a href="{{url('/games')}}">Players</a>
                    <a href="{{url('/groups')}}">Groups</a>
                    <a href="{{url('/scores')}}">Scores</a>
                    <a href="{{url('/highscores/leaderboard')}}">HighScores</a>
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
            </div>
        </div>
    </body>
</html>