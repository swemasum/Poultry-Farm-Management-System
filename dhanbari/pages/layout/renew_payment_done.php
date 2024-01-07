<?php


session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{


 include_once "../../../connection.php";
$date=date("Y-m-d");
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 //select from current student
 $sql = "SELECT current_student_id,requested_course,type,status FROM current_student";
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
$id=$row["current_student_id"];
          //check_status
        if($row['status']=='active'){
          //payable amount
          $sql2 = "SELECT * FROM payment_set ";
          $result2 = mysqli_query($conn, $sql2);

          if (mysqli_num_rows($result2) > 0) {
              // output data of each row
              while($row2 = mysqli_fetch_assoc($result2)) {
                  if($row2['type']==$row['type'] && $row2['course']==$row['requested_course'] && $row['type'] != "Model Test" && $row2['shift']==$row['shift']){
                      $payable=$row2['amount'];

                      //insert new payable Amount
                      $sql= "INSERT INTO payable (s_id,payable_amount,date)
                      VALUES ('$id','$payable','$date')";

                      if (mysqli_query($conn, $sql)) {

                      } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }

                  }
              }
          } else {
              echo "0 results";
          }
        }

     }
 } else {
     echo "0 results";
 }




//update date

//insert new payable Amount
$sql= "INSERT INTO renew (date)
VALUES ('$date')";

if (mysqli_query($conn, $sql)) {
    header('Location:renew.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
  ?>
