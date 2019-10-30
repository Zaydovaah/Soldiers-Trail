<?php
include("../includes/config.php");
$ObstacleID = $_GET['ObstacleID'];
 
$result = mysqli_query($mysqli, "SELECT * FROM Obstacle WHERE ObstacleID=$ObstacleID");
 
while($res=mysqli_fetch_array($result))
{       
        $Name = $res['Name'];   
        $Difficulty = $res['Difficulty'];    
        $Bonus = $res['Bonus'];
        $Requirement = $res['Requirement'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Obstacle Edit</title>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/soldieradd.css">
</head>
<body>
<header>
<nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li>Obstacles
                    <ul>
                        <li><a href="../obstacles.php">View Obstacle(s)</a></li>
                        <li><a href="../adds/obstadd.php">Add Obstacle</a></li>
                    </ul>
                </li>
                <li>Soldiers
                <ul>
                    <li><a href="../soldier.php">View Soldier(s)</a></li>
                    <li><a href="../adds/soldieradd.php">Add Soldier</a></li>
                </ul>
                </li>
                <li>Examinators
                <ul>
                    <li><a href="../examinator.php">View Examinator(s)</a></li>
                    <li><a href="../adds/examinatoradd.php">Add Examinator</a></li>
                </ul>
                </li>
                <li>Results
                <ul>
                    <li> <a href="../result.php">View Results</a> </li>
                    <li> <a href="../adds/resultadd.php">Add Results</a> </li>
                </ul>
            </li>
            </ul>
        </nav>
        <h1>Parcours du Combattant</h1>
    </header>
<h1>Obstacle Edit</h1>
    <p>Cliquez sur Enregistrer aprés vos modifications</p>
    <form action="editobstacle.php" method="POST">
        <input type="number" placeholder="ID" name="ObstacleID" value="<?php echo $ObstacleID; ?>" readonly>
        <input type="text" placeholder="Nom Obstacle" name="Name" value="<?php echo $Name; ?>">
        <select name="Difficulty" id="" value="<?php echo $Difficulty; ?>">
            <option value="">Niveau de Difficulté</option>
            <option value="Facile">Facile</option>
            <option value="Moyen">Moyen</option>
            <option value="Difficile">Difficile</option>
        </select>
        <input type="number" placeholder="Bonus" name="Bonus" value="<?php echo $Bonus; ?>">
        <input type="number" placeholder="Note Minimale pour Passage" name="Requirement" value="<?php echo $Requirement; ?>">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    
  <?php
        if (isset($_POST["submit"])) {
            extract($_POST);
  
            if((empty($Name) || empty($Difficulty) || empty($Bonus) || empty($Requirement))) {
              echo "<font color='red'>Veuillez remplir tous les champs avant d'enregistrer";
      }       
      else {
        $result = mysqli_query($mysqli, "UPDATE Obstacle SET Name='$Name', Difficulty='$Difficulty',Bonus='$Bonus',Requirement='$Requirement' WHERE ObstacleID=$ObstacleID");
        echo "<font color='green'>Données enregistrées avec succés. </br>";    
      }
      header("location: ../obstacles.php");
        }
  ?>

</body>
</html>
