<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $name = $_POST['name'];

  $phone = $_POST['phone'];

  $address = $_POST['address'];
  $date=$_POST['date'];
$narration=$_POST['narration'];
$quantity=$_POST['quantity'];


$sql = "INSERT INTO supply_problem_egg (name,phone,address,date,quantity,narration)
VALUES ('$name','$phone','$address','$date','$quantity','$narration')";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:supply_problem_egg.php');

}


 ?>
