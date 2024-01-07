<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{

$customer_type=$_POST['customer_type'];
  $name = $_POST['name'];

  $customer_type = $_POST['customer_type'];
  $phone_no = $_POST['contact_ph'];
  $telephone = $_POST['telephone'];


  $address = $_POST['address'];
  $district = $_POST['district'];

  $upozila = $_POST['upozila'];

  $contact_ph= $_POST['contact_ph'];

  $email = $_POST['email'];
  $note = $_POST['note'];



$date=date("Y-m-d");

$sql = "INSERT INTO other_registration (customer_type,name,telephone,address,district,upozila,contact_ph,email,note)
VALUES ('$customer_type','$name','$telephone', '$address','$district','$upozila','$contact_ph','$email','$note')";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id

header('Location:other_registration.php');

}


 ?>
