<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $id = $_POST['id'];

  $total_bird = $_POST['total_bird'];

  $narration = $_POST['narration'];
  $date = $_POST['date'];




$sql = "update dead_bird set quantity='$total_bird',narration='$narration',date='$date' where dead_bird_id='$id'";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:dead_bird.php?edit=true');

}


 ?>
