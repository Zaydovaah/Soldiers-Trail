<?php
  include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Obstacles
                    <ul>
                        <li><a href="obstacles.php">View Obstacle(s)</a></li>
                        <li><a href="adds/obstadd.php">Add Obstacle</a></li>
                    </ul>
                </li>
                <li>Soldiers
                    <ul>
                        <li><a href="soldier.php">View Soldier(s)</a></li>
                        <li><a href="adds/soldieradd.php">Add Soldier</a></li>
                    </ul>
                </li>
                <li>Results
                <ul>
                    <li> <a href="result.php">View Results</a> </li>
                    <li> <a href="adds/resultadd.php">Add Results</a> </li>
                </ul>
            </li>
            </ul>
        </nav>
        <h1>Parcours du Combattant</h1>
    </header>
</body>

</html>