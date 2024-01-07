<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  include_once "../../../connection.php";
$ps_id=$_REQUEST['id'];
echo $ps_id;


// find out last batch no of current student
$sql = "SELECT status FROM batch where b_id='$ps_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $status=$row['status'];
    }
} else {
    echo "0 results";
}

if($status=='running'){
  $sql = "UPDATE batch SET status = 'finished' WHERE b_id='$ps_id'";
}else{
  $sql = "UPDATE batch SET status = 'running' WHERE b_id='$ps_id'";
}

if (mysqli_query($conn, $sql)) {
      header('Location: batch_set.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
 ?>
