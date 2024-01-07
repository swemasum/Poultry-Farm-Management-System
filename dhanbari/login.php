<?php
session_start();

 if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $password=$_POST['password'];

   include_once "connection.php";
   $sql = "SELECT a_id,username,password FROM admin where username='$email' and password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {

          $_SESSION['admin']=$row['a_id'];

          header('Location:select_branch.php');

    }else{

    }
} else {
header('Location:index.php');
}

mysqli_close($conn);
 }

 ?>
