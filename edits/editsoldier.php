<?php
include("../includes/config.php");
$SoldierID = $_GET['SoldierID'];
 
$result = mysqli_query($mysqli, "SELECT * FROM Soldier WHERE SoldierID=$SoldierID");
 
while($res=mysqli_fetch_array($result))
{
        $Matricule = $res['Matricule'];   
        $Full_Name = $res['Full_Name'];    
        $Grade = $res['Grade'];
        $Email = $res['Email'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soldier Edit</title>
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
<h1>Soldier Edit</h1>
    <p>Cliquez sur Enregistrer aprés vos modifications</p>
    <form action="editsoldier.php" method="POST">
    <input type="number" placeholder="ID" name="SoldierID" value="<?php echo $SoldierID;?>" readonly>
    <input type="text" placeholder="Matricule" name="Matricule" value="<?php echo $Matricule;?>">
        <input type="text" placeholder="Nom et Prénom" name="Full_Name" value="<?php echo $Full_Name;?>">
        <select name="Grade" value="<?php echo $Grade;?>">
            <option value="grade">Preciser Grade</option>
            <option value="grade1">Grade 1</option>
            <option value="grade2">Grade 2</option>
            <option value="grade3">Grade 3</option>
        </select>
        <input type="email" placeholder="Adresse e-mail" name="Email" value="<?php echo $Email;?>">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    
  <?php
        if (isset($_POST["submit"])) {
            extract($_POST);
  
            if((empty($Matricule) || empty($Full_Name) || empty($Grade) || empty($Email))) {
              echo "<font color='red'>Veuillez remplir tous les champs avant d'enregistrer";
      }       
      else {
        $result = mysqli_query($mysqli, "UPDATE Soldier SET Matricule='$Matricule', Full_Name='$Full_Name',Grade='$Grade',Email='$Email' WHERE SoldierID=$SoldierID");
        echo "<font color='green'>Données enregistrées avec succés. </br>";    
      }
      header("location: ../soldier.php");
        }
  ?>

</body>
</html>
