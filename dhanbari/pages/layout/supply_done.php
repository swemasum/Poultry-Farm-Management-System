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
$quantity=$_POST['quantity'];
$narration=$_POST['narration'];


$sql = "INSERT INTO supply (name,phone,address,date,quantity,narration)
VALUES ('$name','$phone','$address','$date','$quantity','$narration')";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id
//
header('Location:all_student.php');

}


 ?>
