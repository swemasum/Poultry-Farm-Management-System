<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $id = $_POST['id'];

  $total_egg = $_POST['total_egg'];

  $defect_egg = $_POST['defect_egg'];
  $rejected_egg = $_POST['rejected_egg'];




$sql = "update purchase_egg set total_egg='$total_egg',defect_egg='$defect_egg',rejected_egg='$rejected_egg' where p_id='$id'";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:purchase_entry.php?edit=true');

}


 ?>
