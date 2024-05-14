<?php
    session_start();

    if(isset($_POST["buttoun"])){
        $_SESSION["p1Score"]=0;
        $_SESSION["p2Score"]=0;
        $_SESSION["p3Score"]=0;
        $_SESSION["p1"]=$_POST["playerone"];
        $_SESSION["p2"]=$_POST["playertwo"];
        $_SESSION["p3"]=$_POST["playerthree"];
        $_SESSION["diceNum"]=$_POST["dNum"];
        $_SESSION["roundNum"]=$_POST["rNum"];
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
        

?>