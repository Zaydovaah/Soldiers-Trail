<?php
include("../includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Obstacle Adding</title>
    <link rel="stylesheet" href="../css/header.css"> 
    <link rel="stylesheet" href="../css/obstadd.css"> 
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
<h1>Nouvel Obstacle</h1>
    <p>Remplir tous les champs pour ajouter un nouvel obstacle.</p>
    <p>Le Bonus attribué au passage dépend du niveau de difficulté de l'obstacle:</p>
   
       <p>Facile: 1 Point</p>
       <p>Moyen: 2 Points</p>
       <p>Difficile: 3 Points</p>
   
    <form action="obstadd.php" method="POST">
        <input type="text" placeholder="Nom de l'Obstacle" name="Name" value="<?php echo isset($_POST["Name"]) ? $_POST["Name"] : ''; ?>">
        <select name="Difficulty" id="" value="<?php echo isset($_POST["Difficulty"]) ? $_POST["Difficulty"] : ''; ?>">
            <option value="None" >Niveau de Difficulté</option>
            <option value="Easy">Facile</option>
            <option value="Medium">Moyen</option>
            <option value="Hard">Difficile</option>
        </select>
        <input type="number" placeholder="Note Minimale pour Passage" name="Requirement" value="<?php echo isset($_POST["Requirement"]) ? $_POST["Requirement"] : ''; ?>">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
  <?php
      if (isset($_POST["submit"])) {
          extract($_POST);
          $Bonus="";
          if($Difficulty="Easy"){$Bonus=1;} elseif($Difficulty="Medium"){$Bonus=2;} else {$Bonus=3;}
          if((empty($Name) || empty($Difficulty) || empty($Requirement))) {
            echo "<font color='red'>Veuillez remplir tous les champs avant d'enregistrer";
    }       
    else {

        $result = "INSERT INTO Obstacle (Name, Difficulty, Bonus, Requirement) VALUES ('$Name', '$Difficulty', '$Bonus', '$Requirement');";
        mysqli_query ($mysqli, $result);
        echo "<font color='green'>Données enregistrées avec succés. </br>";
        
    }
      }
  ?>

</body>
</html>
