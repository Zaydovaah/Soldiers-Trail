<?php
include("includes/config.php");
include("includes/header.php");
$result = mysqli_query($mysqli, "SELECT * FROM Obstacle ORDER BY ObstacleID ASC");
?> 
<title>Obstacles</title>
<link rel="stylesheet" href="css/obstacles.css">
<h2>Obstacles Listing</h2>
<table width='80%' border=0>
    <tr>
        <th>ID</th>
        <th>Nom Obstacle</th>
        <th>Niveau de Difficulté</th>
        <th>Bonus</th>
        <th>Note Minimale Requise</th>
    </tr>
    <?php 
        
        while($res=mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['ObstacleID']."</td>";
            echo "<td>".$res['Name']."</td>";
            echo "<td>".$res['Difficulty']."</td>";
            echo "<td>".$res['Bonus']."</td>";
            echo "<td>".$res['Requirement']."</td>";
            echo "<td><a class=\"edit\" href=\"edits/editobstacle.php?ObstacleID=$res[ObstacleID]\" >Modifier</a> | <a class=\"delete\" href=\"deletes/deleteobstacle.php?ObstacleID=$res[ObstacleID]\" onClick=\"return confirm('Confirmer Suppression?')\">Supprimer</a></td>";
            echo "<tr>";
        }
        ?>
</table>