<?php

include("../includes/config.php");

$ObstacleID = $_GET['ObstacleID'];
 

$result = mysqli_query($mysqli, "DELETE FROM Obstacle WHERE ObstacleID=$ObstacleID");
 

header("Location:../obstacles.php");

?>