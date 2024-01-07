<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $company_name = $_POST['company_name'];

  $company_type = $_POST['company_type'];
  $phone_no = $_POST['contact_ph'];
  $telephone = $_POST['telephone'];


  $address = $_POST['address'];
  $branch_name = $_POST['branch_name'];
  $contact_ph= $_POST['contact_ph'];

  $fax = $_POST['fax'];
  $website = $_POST['website'];
  $email = $_POST['email'];
  $note = $_POST['note'];



$date=date("Y-m-d");

$sql = "INSERT INTO corporate_registration (company_name,company_type,telephone,address,branch_name,contact_ph,fax,website,email,note)
VALUES ('$company_name','$company_type','$telephone', '$address','$branch_name','$contact_ph','$fax','$website','$email','$note')";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id

header('Location:add_student.php');

}


 ?>
