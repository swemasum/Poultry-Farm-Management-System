<?php
include_once "../../connection.php";
session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


  $s_name = $_POST['s_name'];

  $father_name = $_POST['f_name'];
  $phone_no = $_POST['phone_no'];

  $subject = $_POST['subject'];
  $roll_no = $_POST['roll_no'];
  $session= $_POST['session'];
 $student_id=$_SESSION['student_id'];
  $registration = $_POST['registration'];


  ///file upload
if($_FILES['file']['name']!=''){
  $name = $_FILES['file']['name'];
  echo $name;
  $tmp_name =  $_FILES['file']['tmp_name'];
  $location = "application/";
  $uniquename=time()."-".rand(1000, 9999)."-".$name;

  $new_name = $location.$uniquename;
  if (move_uploaded_file($tmp_name, $new_name)){
              }
  else{

      $new_name = $location.time()."-".rand(1000, 9999)."-".$name;
      if (move_uploaded_file($tmp_name, $new_name)){
                  }
      else{
        $uniquename='';

      }
  }

  $sql="UPDATE student_info SET image='$uniquename' WHERE s_id='$student_id'";
  //$sql = "INSERT INTO student_info (s_name,f_name,phone_no,subject,roll_no,session,registration,date,image)
  //VALUES ('$s_name','$father_name','$phone_no', '$subject','$roll_no','$session','$registration','$date','$uniquename')";
  if (mysqli_query($conn, $sql)) {


  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}






$date=date("Y-m-d");
$sql="UPDATE student_info SET s_name='$s_name',f_name='$father_name',phone_no='$phone_no',subject='$subject',roll_no='$roll_no',session='$session',registration='$registration' WHERE s_id='$student_id'";
//$sql = "INSERT INTO student_info (s_name,f_name,phone_no,subject,roll_no,session,registration,date,image)
//VALUES ('$s_name','$father_name','$phone_no', '$subject','$roll_no','$session','$registration','$date','$uniquename')";
if (mysqli_query($conn, $sql)) {


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
///find out last id

header('Location:all_student.php');

}


 ?>
