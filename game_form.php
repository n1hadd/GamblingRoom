<?php
    session_start();

    if(isset($_POST["submit"])){
        $_SESSION["p1Score"]=0;
        $_SESSION["p2Score"]=0;
        $_SESSION["p3Score"]=0;
        $_SESSION["p1"]=$_POST["playerone"];
        $_SESSION["p2"]=$_POST["playertwo"];
        $_SESSION["p3"]=$_POST["playerthree"];
        $_SESSION["diceNum"]=$_POST["diceC"];
        $_SESSION["roundNum"]=$_POST["turnC"];
        $_SESSION["roundN"]=0;
    }

    
    $p1Roll=array();
    $p2Roll=array();
    $p3Roll=array();
    
    for ($y = 0; $y <$_SESSION["diceNum"] ; $y++) {
            array_push($p1Roll,rand(1,6));
            array_push($p2Roll,rand(1,6));
            array_push($p3Roll,rand(1,6));
    }
    
    
    if($_SESSION["roundN"]<$_SESSION["roundNum"]){
        $_SESSION["roundN"]++;
        for ($x = 0; $x <sizeof($p1Roll) ; $x++) {
        $_SESSION["p1Score"]+=$p1Roll[$x];
        $_SESSION["p2Score"]+=$p2Roll[$x];
        $_SESSION["p3Score"]+=$p3Roll[$x];
        }
    }

    function diceAnim($playerRollArr, $playerIndex){
        // Generate unique IDs for the dice animation and dice images containers
        $animationId = 'dice-animation-' . $playerIndex;
        $imagesId = 'dice-img-' . $playerIndex;
    
        echo "<div id='$animationId'>
                <img src='img/dice-anim.gif' alt='Rolling dice animation'>
              </div>";


        echo "<audio id='dice-sound'>
              <source src='dice_sound.mp3' type='audio/mpeg'>
             </audio>";
        
        echo "<script>
                setTimeout(function() {
                    document.getElementById('$animationId').style.display = 'none';
                    var diceImages = document.querySelectorAll('#$imagesId');
                    for (var i = 0; i < diceImages.length; i++) {
                        diceImages[i].style.display = 'inline';
                    }
                    document.getElementById('dice-sound').play();
                }, 1000);
              </script>";
        echo "<div id='$imagesId' style='display:none;'>";
        for ($x = 0; $x < $_SESSION["diceNum"]; $x++) {
            echo "<img src='img/dice" . $playerRollArr[$x] . ".gif' alt='dice$x'>";
        }
        echo "</div>";
    }
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

<body onload="generate()">
    <div class="container2">
    <form name="obrazec" id="obrazec" method="post" autocomplete="off" action="<?php if($_SESSION["roundN"]==$_SESSION["roundNum"]){echo 'results.php';}else{echo 'game_form.php';}?>">
            <div class="header">
                    <h1>Dice Throw</h1>
            </div>
            <div id="round">
                Round: <?php echo $_SESSION["roundN"]  ?>
            </div>
            <div id="wrapper">
                <div class="playerg">
                    <?php
                        diceAnim($p1Roll, 1);
                    ?></br></br></br>
                    <strong class="name"><?php echo $_SESSION["p1"];  ?></strong></br>
                    <div class="number"><?php echo $_SESSION["p1Score"];  ?></div>
                </div>

                <div class="playerg">
                    <?php  
                        diceAnim($p2Roll, 2);
                    ?>
                    </br></br></br>

                    <strong class="name"><?php echo $_SESSION["p2"];  ?></strong></br>
                    <div class="number"><?php echo $_SESSION["p2Score"];  ?></div>
                </div>
                <div class="playerg">
                    <?php  
                        diceAnim($p3Roll, 3);
                    ?>
                    </br></br></br>

                    <strong class="name"><?php echo $_SESSION["p3"];  ?></strong></br>
                    <div class="number"><?php echo $_SESSION["p3Score"];  ?></div>
                </div>
                <div id="button" >
                    <input type="submit" id="button-roll" value="<?php if($_SESSION["roundN"]==$_SESSION["roundNum"]){echo 'Results';}else {echo 'Roll';}  ?>">
                </div>
            </div>

        </form>
    </div>
</body>

</html>