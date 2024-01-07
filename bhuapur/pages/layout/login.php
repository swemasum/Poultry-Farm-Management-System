<?php
session_start();
echo $_POST['email'];
 if(isset($_POST['password'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
echo $email;
echo $password;
   include_once "../connection.php";
   $sql = "SELECT a_id FROM admin";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($row['email']==$email && $row['password']==$password){
          $_SESSION['admin']=$row['a_id'];

          header('Location:admin.php');
      }
    }
} else {
      header('Location:index.php');
}

mysqli_close($conn);
 }

 ?>
