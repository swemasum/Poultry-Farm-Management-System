
<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


include_once "../../connection.php";
$date=date("Y-m-d");
$year=$_POST['year'];
$semester=$_POST['semester'];
$admission=$_POST['admission'];
$emolument=$_POST['emolument'];
$test=$_POST['test'];
$in_course=$_POST['in_course'];
$form_fill_up=$_POST['form_fill_up'];

// sql to delete a record
$sql = "DELETE FROM payment WHERE year='$year'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  $sql = "insert into payment(year	,semester	,admission,emolument,test,in_course,form_fill_up,date)
  values('$year','$semester','$admission','$emolument','$test','$in_course','$form_fill_up','$date');";



if (mysqli_query($conn, $sql)) {
    echo "Successfully update batch no";

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



  header('Location: set_payment.php');
mysqli_close($conn);

}
?>
