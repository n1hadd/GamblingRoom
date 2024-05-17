<?php




?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.cdnfonts.com/css/casino" rel="stylesheet">
    
    <title>Gambling Room</title>
</head>
<body>
    <?php
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
            const container = document.querySelector('.containerRes');
            const fireworks = new Fireworks(container, {
                // Add your options here
            });
            fireworks.start();
            });
        </script>";
    ?>
    
    <div class="containerRes">
        <div class="header">
            <h1>Results</h1>
        </div>

        <div class="wrapperRes">
            <div class="pThird">
            </div>

            <div class="pWinner">
            </div>

            <div class="pSecond">
            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>
</body>
</html>