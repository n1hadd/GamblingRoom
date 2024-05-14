<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.cdnfonts.com/css/casino" rel="stylesheet">
    <title>Gambling Room</title>
</head>

<body onload="generate()">
    <div id="container">
       <form name="form" id="form" action="game_form.php" method="POST">
            <div class="player">
                <h1>First player</h1>
                <input type="text" name="playerone" id="player1" placeholder="Enter your name here." required>
            </div>

            <div class="player">
                <h1>Second player</h1>
                <input type="text" name="playertwo" id="player2" placeholder="Enter your name here." required>
            </div>

            <div class="player">
                <h1>Third player</h1>
                <input type="text" name="playerthree" id="player3" placeholder="Enter your name here." required>
            </div>

            <div id="game_settings">
                <div id="set_dice_count">
                    <h1>Dice Count</h1>
                    <select name="diceC" id="dice_count">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div id="set_turns_count">
                    <h1>Turns</h1>
                    <select name="turnC" id="turn_count">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <input type="submit" id="submit" name="submit" value="PLAY">
       </form>
    </div>
</body>


</html>