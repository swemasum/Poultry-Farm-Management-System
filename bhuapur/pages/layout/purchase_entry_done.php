<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $total_egg = $_POST['total_egg'];

  $defect_egg = $_POST['defect_egg'];

  $date = $_POST['date'];
  $rejected_egg = $_POST['rejected_egg'];




$sql = "INSERT INTO purchase_egg (total_egg,defect_egg,date,rejected_egg)
VALUES ('$total_egg','$defect_egg','$date','$rejected_egg')";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:purchase_entry.php');

}


 ?>
