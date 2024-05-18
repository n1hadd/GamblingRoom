<?php
    session_start();

function determineWinners() {
    $winners = [];
    
    $players = [
        $_SESSION["p1"] => $_SESSION["p1Score"],
        $_SESSION["p2"] => $_SESSION["p2Score"],
        $_SESSION["p3"] => $_SESSION["p3Score"]
    ];

    arsort($players); // sort $players descending

    $winner = key($players); // key() gets the key of the current array element
    $winnerScore = current($players); // current() gets the score
    next($players); // moves pointer to next element

    $secondPlace = key($players);
    $secondPlaceScore = current($players);
    next($players);

    $thirdPlace = key($players);
    $thirdPlaceScore = current($players);

    $winners['winnerName'] = $winner;
    $winners['winnerScore'] = $winnerScore;
    $winners['secondPlaceName'] = $secondPlace;
    $winners['secondPlaceScore'] = $secondPlaceScore;
    $winners['thirdPlaceName'] = $thirdPlace;
    $winners['thirdPlaceScore'] = $thirdPlaceScore;

    return $winners;
}

    $winners = determineWinners();

    $winnerName = $winners['winnerName'];
    $winnerScore = $winners['winnerScore'];
    $secondPlaceName = $winners['secondPlaceName'];
    $secondPlaceScore = $winners['secondPlaceScore'];
    $thirdPlaceName = $winners['thirdPlaceName'];
    $thirdPlaceScore = $winners['thirdPlaceScore'];

    $_SESSION["winnerName"] = $winnerName;
    $_SESSION["winnerScore"] = $winnerScore;
    $_SESSION["secondPlaceName"] = $secondPlaceName;
    $_SESSION["secondPlaceScore"] = $secondPlaceScore;
    $_SESSION["thirdPlaceName"] = $thirdPlaceName;
    $_SESSION["thirdPlaceScore"] = $thirdPlaceScore;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.cdnfonts.com/css/casino" rel="stylesheet">
    <link rel="icon" href="img/dice.png" type="img/x-icon">
    <title>Gambling Room</title>
</head>
<body>
    <div class="fireworks">
        <div class="containerRes">
            <div class="header">
                <h1>Results</h1>
            </div>

            <div class="wrapperRes">
                <div class="pThird">
                    <h1 class="bronze">Third Place</h1></br>
                    <h1 class="name">Name: </h1></br>
                    <h1 class="name"><?php echo $_SESSION["thirdPlaceName"];  ?></h1></br>
                    <h1 class="name">Score: </h1></br>
                    <h1 class="name"><?php echo $_SESSION["thirdPlaceScore"];  ?></h1></br>
                </div>

                <div class="pWinner">
                    <h1 class="gold">Winner</h1></br>
                    <h1 class="name">Name: </h1></br>
                    <h1 class="name"><?php echo $_SESSION["winnerName"];  ?></h1></br>
                    <h1 class="name">Score: </h1></br>
                    <h1 class="name"><?php echo $_SESSION["winnerScore"];  ?></h1></br>
                </div>

                <div class="pSecond">
                    <h1 class="silver">Second Place</h1></br>
                    <h1 class="name">Name: </h1></br>
                    <h1 class="name"><?php echo $_SESSION["secondPlaceName"];  ?></h1></br>
                    <h1 class="name">Score: </h1></br>
                    <h1 class="name"><?php echo $_SESSION["secondPlaceScore"];  ?></h1></br>
                </div>
            </div>
            <div id="redirectMessage">
                You will be redirected in&nbsp<span id="countdown">15</span>&nbspseconds.
            </div>
            


        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>
    

    <script>
        var secondsLeft = 15;
            function redirTimer(){
                setInterval(function(){
                if(secondsLeft==0){
                    location.href="index.php";
                }
                else{
                    document.getElementById("countdown").innerHTML = --secondsLeft; }
                }, 1000);
        }

        // Start the countdown when the page loads
        window.onload = function() {
            // Start the fireworks animation
                const container = document.querySelector('.fireworks');
                const fireworks = new Fireworks.default(container);
                fireworks.start();

            // Start the countdown
            setTimeout(redirTimer, 1000);
        };

    </script>
    
</body>
</html>