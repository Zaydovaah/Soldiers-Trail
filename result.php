<?php
include("includes/config.php");
include("includes/header.php");
$result = mysqli_query($mysqli, "SELECT * FROM Exam ORDER BY ExamID ASC");
$result1 = mysqli_query($mysqli, "SELECT * FROM Obstacle");
$result2 = mysqli_query($mysqli, "SELECT * FROM Soldier");

?>
 <link rel="stylesheet" href="css/result.css">
 <h2>Resultats Parcours</h2>
<table width='80%' border=0>
        <tr>
            <th>Obstacle Name</th>
            <th>Soldier Name</th>
            <th>Matricule</th>
            <th>Examinator Name</th>
            <th>Date</th>
            <th>Temps de Passage</th>
            <th>Requirement</th>
            <th>Bonus</th>
            <th>Examinator Score</th>
            <th>Final Score</th>
            <th>Status</th>
        </tr>
        <?php 
        
        while($res = mysqli_fetch_array($result)) {    
            $status = "";
            $res1 = mysqli_fetch_array($result1);
            $res2 = mysqli_fetch_array($result2);
            $Final = $res1['Bonus'] + $res['Score'];
            $Requirement= $res1['Requirement'];
            $Matricule = $res2['Matricule'];
            if($Final < $Requirement) {$status="Fail";} elseif($Final >= $Requirement) {$status="Pass";} else {$status="Fail";}
            echo "<tr>";
            echo "<td>".$res['ObstacleName']."</td>";
            echo "<td>".$res['SoldierName']."</td>";
            echo "<td>".$res['Matricule']."</td>";
            echo "<td>".$res['ExaminatorName']."</td>";
            echo "<td>".$res['Date']."</td>";
            echo "<td>".$res['PassTime']."</td>";
            echo "<td>".$Requirement."</td>";
            echo "<td>".$res1['Bonus']."</td>";
            echo "<td>".$res['Score']."</td>";
            echo "<td>".$Final."</td>";
            echo "<td>".$status."</td>";
            echo "<td><a class=\"edit\" href=\"edits/editresult.php?ExamID=$res[ExamID]\" >Modifier</a> | <a class=\"delete\" href=\"deletes/deleteresult.php?ExamID=$res[ExamID]\" onClick=\"return confirm('Confirmer Suppression?')\">Supprimer</a></td>"; 
            echo "<tr>";
        }
        ?>
</table>