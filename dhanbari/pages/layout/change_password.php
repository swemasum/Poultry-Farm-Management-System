<?php

session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{

include_once "../../connection.php";

$new_pass=$_POST['renew_pass'];
echo 'hellow';
echo $new_pass;
  $sql = "UPDATE admin set password='$new_pass' WHERE a_id=1";

if (mysqli_query($conn, $sql)) {
  header("Location:../../admin.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);


}
 ?>
