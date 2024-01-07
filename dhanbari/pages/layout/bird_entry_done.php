<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $total_bird = $_POST['total_bird'];
//  $dead_bird = $_POST['dead_bird'];
  $narration = $_POST['narration'];
  $date = $_POST['date'];





$sql = "INSERT INTO bird (quantity,date,narration)
VALUES ('$total_bird','$date','$narration')";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header('Location:new_bird.php');

}


 ?>
