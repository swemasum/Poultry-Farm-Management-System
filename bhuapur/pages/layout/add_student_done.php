

<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{

include_once "../../../connection.php";
$batch_no=$_POST['batch_no'];
$student_id=$_SESSION["student_id"];

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  $sql = "UPDATE current_student
SET batch_no = '$batch_no'
WHERE current_student_id = $student_id;";



if (mysqli_query($conn, $sql)) {
    echo "Successfully update batch no";
  header('Location: add_student.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
