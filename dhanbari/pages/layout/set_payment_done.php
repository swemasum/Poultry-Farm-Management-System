

<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{



include_once "../../../connection.php";
$batch_id=$_POST['batch_id'];
$student_id=$_SESSION["student_id"];

$sql = "SELECT roll FROM current_student where batch_id=$batch_id order by roll DESC limit 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $last_roll=$row['roll'];
    }
} else {
    echo "0 results";
}

if(isset($last_roll)){
  list($batch_id, $seial) = split('[/.-]', $last_roll);
echo "batch: $batch_id; serial: $seial; \n";
$seial++;
$new_roll = $batch_id . '-' . $seial;

}else{
 $new_roll = $batch_id . '-' . '1';
}

$_SESSION['roll']=$new_roll;

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  $sql = "UPDATE current_student
SET batch_id = '$batch_id',roll = '$new_roll'
WHERE current_student_id = $student_id;";



if (mysqli_query($conn, $sql)) {
    echo "Successfully update batch no";
  header('Location: roll_confirm.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}
?>
