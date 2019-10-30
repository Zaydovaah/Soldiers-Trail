<?php
include("includes/config.php");
include("includes/header.php");
$result = mysqli_query($mysqli, "SELECT * FROM Soldier ORDER BY SoldierID ASC");
?>
<title>Soldiers</title>
<link rel="stylesheet" href="css/soldier.css">
<h2>Soldiers Listing</h2>
<table width='80%' border=0>
        <tr>
            <th>ID</th>
            <th>Matricule</th>
            <th>Nom et Prénom</th>
            <th>Grade</th>
            <th>Adresse E-mail</th>
        </tr>
        <?php 
        
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['SoldierID']."</td>";
            echo "<td>".$res['Matricule']."</td>";
            echo "<td>".$res['Full_Name']."</td>";
            echo "<td>".$res['Grade']."</td>";
            echo "<td>".$res['Email']."</td>";
            echo "<td><a class=\"edit\" href=\"edits/editsoldier.php?SoldierID=$res[SoldierID]\" >Modifier</a> | <a class=\"delete\" href=\"deletes/deletesoldier.php?SoldierID=$res[SoldierID]\" onClick=\"return confirm('Confirmer Suppression?')\">Supprimer</a></td>"; 
            echo "<tr>";
        }
        ?>
</table>