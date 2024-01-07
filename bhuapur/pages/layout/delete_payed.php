<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{

include_once "../../../connection.php";
$payed_id=$_GET['id'];
$sql = "DELETE FROM payed WHERE payed_id=$payed_id";

if (mysqli_query($conn, $sql)) {
    header('Location: payment_status.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
}

 ?>
