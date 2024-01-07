<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{



  include_once "../../connection.php";
$ps_id=$_REQUEST['id'];
echo $ps_id;

$sql = "DELETE FROM payment WHERE p_id='$ps_id'";

if (mysqli_query($conn, $sql)) {
      header('Location: set_payment.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}

 ?>
