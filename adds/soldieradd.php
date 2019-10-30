<?php
   include("../includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                        <li><a href="obstadd.php">Add Obstacle</a></li>
                    </ul>
                </li>
                <li>Soldiers
                <ul>
                    <li><a href="../soldier.php">View Soldier(s)</a></li>
                    <li><a href="soldieradd.php">Add Soldier</a></li>
                </ul>
                </li>
                <li>Examinators
                <ul>
                    <li><a href="../examinator.php">View Examinator(s)</a></li>
                    <li><a href="examinatoradd.php">Add Examinator</a></li>
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
<h1>New Soldier Register</h1>
    <p>Remplir tous les champs pour ajouter un nouveau participant.</p>
    <form action="soldieradd.php" method="POST">
        <input type="text" placeholder="Matricule" name="Matricule" value="<?php echo isset($_POST["Matricule"]) ? $_POST["Matricule"] : ''; ?>">
        <input type="text" placeholder="Nom et Prénom" name="Full_Name" value="<?php echo isset($_POST["Full_Name"]) ? $_POST["Full_Name"] : ''; ?>">
        <select name="Grade" id="" value="<?php echo isset($_POST["Grade"]) ? $_POST["Grade"] : ''; ?>">
            <option value="grade">Preciser Grade</option>
            <option value="grade1">Grade 1</option>
            <option value="grade2">Grade 2</option>
            <option value="grade3">Grade 3</option>
        </select>
        <input type="email" placeholder="Adresse e-mail" name="Email" value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>">
        <input type="submit" value="Enregistrer" name="submit">
    </form>

    <?php
      if (isset($_POST["submit"])) {
          extract($_POST);

          if((empty($Matricule) || empty($Full_Name) || empty($Grade) || empty($Email))) {
            echo "<font color='red'>Veuillez remplir tous les champs avant d'enregistrer";
    }       
    else {

        $result = "INSERT INTO Soldier (Matricule, Full_Name, Grade, Email) VALUES ('$Matricule', '$Full_Name', '$Grade', '$Email');";
        mysqli_query ($mysqli, $result);
        echo "<font color='green'>Données enregistrées avec succés. </br>";
    }
      }
  ?>
</body>
</html>