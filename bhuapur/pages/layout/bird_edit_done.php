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




$sql = "update bird set quantity='$total_bird',date='$date',narration='$narration' where bird_id='$id'";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:new_bird.php?edit=true');

}


 ?>
