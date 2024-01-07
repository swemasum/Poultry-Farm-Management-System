<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{



  include_once "../../../connection.php";
if (isset($_POST["s_id"]) && $_POST["s_id"]>0) {
    echo "Yes, mail is set";
    echo  $_POST["s_id"];
    $s_id=$_POST["s_id"];

    $mayment_method=$_POST['mayment_method'];
    $pay_id=$_POST['pay_id'];
    $payed_amount=$_POST['payed_amount'];
    $date=date("Y-m-d");



    $sql = "INSERT INTO payed (s_id,mayment_method,pay_id, payed_amount, date)
    VALUES ('$s_id','$mayment_method', '$pay_id', '$payed_amount','$date')";

    if (mysqli_query($conn, $sql)) {
      $_SESSION['s_id']=$s_id;
        header('Location: payment_status.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}else{

  $s_id=$_SESSION['s_id'];

  $mayment_method=$_POST['mayment_method'];
  $pay_id=$_POST['pay_id'];
  $payed_amount=$_POST['payed_amount'];
  $date=date("Y-m-d");



  $sql = "INSERT INTO payed (s_id,mayment_method,pay_id, payed_amount, date)
  VALUES ('$s_id','$mayment_method', '$pay_id', '$payed_amount','$date')";

  if (mysqli_query($conn, $sql)) {

      header('Location: payment_status.php');
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
}

 ?>
