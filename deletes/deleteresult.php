<?php

include("../includes/config.php");

$ExamID = $_GET['ExamID'];
 

$result = mysqli_query($mysqli, "DELETE FROM Exam WHERE ExamID=$ExamID");
 

header("Location:../result.php");

?>