<?php

include("../includes/config.php");

$SoldierID = $_GET['SoldierID'];
 

$result = mysqli_query($mysqli, "DELETE FROM Soldier WHERE SoldierID=$SoldierID");
 

header("Location:../soldier.php");

?>