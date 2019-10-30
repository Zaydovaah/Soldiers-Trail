<?php
   include("../includes/config.php");
   $result1 = mysqli_query($mysqli, "SELECT * FROM Obstacle ORDER BY ObstacleID ASC");
   $result2 = mysqli_query($mysqli, "SELECT * FROM Soldier ORDER BY SoldierID ASC");
   $result3 = mysqli_query($mysqli, "SELECT * FROM Soldier ORDER BY SoldierID ASC");
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/resultadd.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li>Obstacles
                    <ul>
                        <li><a href="../obstacles.php">View Obstacle(s)</a></li>
                        <li><a href="obstadd.php">Add Obstacle</a></li>
                    </ul>
                </li>
                <li>Soldiers
                    <ul>
                        <li><a href="../soldier.php">View Soldier(s)</a></li>
                        <li><a href="soldieradd.php">Add Soldier</a></li>
                    </ul>
                </li>
                </li>
                <li>Results
                    <ul>
                        <li> <a href="../result.php">View Results</a> </li>
                        <li> <a href="resultadd.php">Add Results</a> </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <h1>Parcours du Combattant</h1>
    </header>
    <h1>Add Results</h1>
    <form action="resultadd.php" method="POST">
        
        <select name="ExaminatorName" id=""
            value="<?php echo isset($_POST["ExaminatorName"]) ? $_POST["ExaminatorName"] : ''; ?>">
            <option>Select Examinator</option>
            <?php  while($res2 = mysqli_fetch_array($result2))
           {echo "<option value=\"$res2[Full_Name]\">".$res2['Full_Name']."</option>"; }
         ?>
        </select>
        <select name="ObstacleName" id=""
            value="<?php echo isset($_POST["ObstacleName"]) ? $_POST["ObstacleName"] : ''; ?>">
            <option>Select Obstacle</option>
            <?php  while($res1 = mysqli_fetch_array($result1))
           {echo "<option value=\"$res1[Name]\">".$res1['Name']."</option>"; }
         ?>
        </select>
        <select name="SoldierName" id=""
            value="<?php echo isset($_POST["SoldierName"]) ? $_POST["SoldierName"] : ''; ?>">
            <option>Select Soldier</option>
            <?php 
             while($res3 = mysqli_fetch_array($result3))
           {echo "<option value=\"$res3[Full_Name]\">".$res3['Full_Name']."</option>"; }
         ?>
         </select>
            <label for="">Date<input type="date" placeholder="Date" name="Date"
                    value="<?php echo isset($_POST["Date"]) ? $_POST["Date"] : ''; ?>"></label>
            <label for="">Temps de Passage<input type="time" placeholder="Passage Time" name="PassTime"
                    value="<?php echo isset($_POST["PassTime"]) ? $_POST["PassTime"] : ''; ?>"></label>
            <input type="int" placeholder="Examinator Score" name="Score"
                value="<?php echo isset($_POST["Score"]) ? $_POST["Score"] : ''; ?>">
            <input type="submit" value="Enregistrer" name="submit">
    </form>

    <?php
      if (isset($_POST["submit"])) {
          extract($_POST);

          if((empty($ObstacleName) || empty($SoldierName) || empty($ExaminatorName) || empty($Date) || empty($PassTime) || empty($Score))) {
            echo "<font color='red'>Veuillez remplir tous les champs avant d'enregistrer";
    }
          elseif($SoldierName==$ExaminatorName) {
            echo "<font color='red'>Soldat et Examinateur doivent être differents";
    }       
    else {
        $result = "SELECT Obstacle.ObstacleID, Soldier.SoldierID FROM Obstacle, Soldier JOIN Exam ON Exam.ObstacleID=Obstacle.ObstacleID";

        $result = "INSERT INTO Exam (ObstacleID, ObstacleName, SoldierID, SoldierName, ExaminatorID, ExaminatorName, Date, PassTime, Score) 
        VALUES ('$res1[ObstacleID]', '$res1[Name]', '$res3[SoldierID]', '$res3[Matricule]', '$res3[SoldierName]', '$res2[SoldierID]', '$res2[Full_Name]', '$Date', '$PassTime', '$Score');";
        mysqli_query ($mysqli, $result);

        echo "<font color='green'>Données enregistrées avec succés. </br>";
    }
      }
  ?>
</body>

</html>