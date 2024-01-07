<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $id = $_POST['id'];

  $name = $_POST['name'];

  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $quantity = $_POST['quantity'];
  $narration = $_POST['narration'];




$sql = "update supply set narration='$narration',name='$name',address='$address',phone='$phone',quantity='$quantity' where s_id='$id'";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:all_student.php?edit=true');

}


 ?>
