<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{



          include_once "../../connection.php";
// sql to delete a record

$id=$_GET['id'];
$sql = "DELETE FROM bird WHERE bird_id=$id";

if (mysqli_query($conn, $sql)) {
   echo "Record deleted successfully";
   header('Location:new_bird.php');
} else {
   echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

}
 ?>
