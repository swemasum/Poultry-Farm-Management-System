<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}else{
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Fixed Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>AM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>KA</b>UC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Abdur Rashid</p>
          <a href="../../logout.php"><i class="fa fa-circle text-success"></i> LOG OUT</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../../admin.php">
            <i class="fa fa-dashboard"></i> <span href="../../admin.php">Dashboard</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

        <li>
          <a href="add_student.php">
            <i class="	glyphicon glyphicon-plus"></i> <span href="add_student.php">Add student</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="set_payment.php"><i class="fa fa-circle-o"></i> Set Payment</a></li>
            <li><a href="registration_id.php"><i class="fa fa-circle-o"></i>Payment Update</a></li>

            </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="	glyphicon glyphicon-user"></i> <span>Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all_student.php"><i class="fa fa-circle-o"></i> All student</a></li>
            </ul>
        </li>

        <li>
          <a href="new_password.php">
            <i class="glyphicon glyphicon-lock"></i> <span href="new_password.php">Change Password</span>

          </a>
        </li>


    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script type="text/javascript">

    function PrintElem(elem)
        {
          var mywindow = window.open('', 'PRINT', 'height=1000,width=1000');




          mywindow.document.write(document.getElementById(elem).innerHTML);

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close();

          return true;
        }
    </script>

    <!-- Main content -->
    <section class="content">
      <a href=""  class="btn btn-primary" onclick="PrintElem('myDivToPrint')"> download </a>
      <div class="" id="myDivToPrint">



<?php
  $student_id=$_GET['print_id'];
  include_once "../../connection.php";
  $sql = "SELECT * FROM student_info where s_id='$student_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $s_name = $row['s_name'];

      $father_name = $row['f_name'];
      $phone_no = $row['phone_no'];

      $subject = $row['subject'];
      $roll_no = $row['roll_no'];
      $session= $row['session'];
      $image=$row['image'];
      $registration =$row['registration'];
$reg=$registration;

          }
} else {
    echo "0 results";
}

 ?>
<h3 style="margin-left:40%">Student Details </h3>
<div class="row">
  <div class="col-md-12">
    <table class="table"  style="width: 100% ; border:1px solid black">
      <thead>
        <tr>
          <th>Student Name : <?php echo $s_name ?></th>
          <th></th>
           <td> <img  height="100px" src="application/<?php echo $image ?>"</td>;

        </tr>
      </thead>
      <thead>
        <tr>
          <th>Father Name : <?php echo $father_name ?></th>

        </tr>
      </thead>
      <thead>
        <tr>
          <th>Subject     : <?php echo $subject ?></th>
          <th>Roll No : <?php echo $roll_no ?></th>
          <th>Session : <?php echo $session ?></th>
        </tr>
      </thead>
      <thead>
        <tr>
          <th>Phone no    : <?php echo $phone_no ?></th>
          <th>Registration no : <?php echo $registration ?></th>

        </tr>
      </thead>

    </table>
  </div>

</div>
<br>
      <div class="row">
        <div class="col-md-7">

        <h3 style="margin-left:40%">Payable & Due </h3>
        <div class="table-wrapper-scroll-x">
          <table class="table" border="1" style="width: 100% ; border-collapse: collapse;">
              <thead>

                <tr class="danger">
                  <td>year</td>
                  <td>semester fee</td>
                  <td>admission fee</td>
                  <td>emolument fee</td>
                  <td>test exam fee</td>
                  <td>in course fee</td>
                  <td>form fill up fee</td>
                  <td>Total fee</td>
                  <td>DUE</td>

                </tr>

                <?php

                  if(isset($reg)){


                  include_once "../../connection.php";
                      // Check connection
                      if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                      }

                      $sql = "SELECT p_id,year,semester,admission,emolument,test,in_course,form_fill_up,date,(semester+admission+emolument+test+in_course+form_fill_up) as total FROM payment ";
                      $result = mysqli_query($conn, $sql);
                     $total=0;
                     $paid=0;
                     $total_due=0;
                      if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                           $year= $row["year"];
                           $paid=0;
                          $sql2 = "SELECT sum(payed_money) as paid FROM payed_money where registration_no='$reg' and year='$year' group by registration_no";
                                  $result2 = mysqli_query($conn, $sql2);

                                  if (mysqli_num_rows($result2) > 0) {
                                      // output data of each row
                                      while($row2 = mysqli_fetch_assoc($result2)) {
                                          $paid=$row2['paid'];
                                      }
                                  }

                            $due=$row["total"]-$paid;
                            $total_due=$total_due+$due;
                           $total=$total+ $row["total"];
                          echo "<tr class='info'>";

                            echo "<td>" . $row["year"]."</td>";
                            echo "<td>" . $row["semester"]."</td>";
                            echo "<td>" . $row["admission"]."</td>";
                            echo "<td>" . $row["emolument"]."</td>";
                            echo "<td>" . $row["test"]."</td>";
                            echo "<td>" . $row["in_course"]."</td>";
                            echo "<td>" . $row["form_fill_up"]."</td>";
                            echo "<td>" . $row["total"]."</td>";
                            echo "<td>" . $due."</td>";

                          echo "</tr>";
                        }
                      } else {

                      }
                      echo "<tr class='danger'>";
                        echo "<td>" ."Total DUE</td>";
                        echo "<td>" ."</td>";
                        echo "<td>"  ."</td>";
                        echo "<td>"  ."</td>";
                        echo "<td>"  ."</td>";
                        echo "<td>"  ."</td>";
                        echo "<td>"  ."</td>";
                        echo "<td>"  ."</td>";
                        echo "<td>" . $total_due."</td>";
                       echo "</tr>";
    }
                    ?>

              </tbody>
            </table>

        </div>
</div>



<div class="col-md-5">

<h3 style="margin-left:40%">Paid Description </h3>
<div class="table-wrapper-scroll-x">
  <table class="table" border="1" style="width: 100% ; border-collapse: collapse;">
      <thead>

        <tr class="danger">
          <td>date</td>
          <td>year</td>
          <td>description</td>
          <td>paid money</td>

        </tr>

        <?php




          include_once "../../connection.php";
              // Check connection
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }


              $sql = "SELECT p_id,date,year,description,payed_money FROM payed_money where registration_no='$reg' ";
              $result = mysqli_query($conn, $sql);
              $total_paid=0;
              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  $total_paid=$total_paid+$row["payed_money"];
                  echo "<tr class='info'>";
                    echo "<td>" . $row["date"]."</td>";
                    echo "<td>" . $row["year"]."</td>";
                    echo "<td>" . $row["description"]."</td>";

                    echo "<td>" . $row["payed_money"]."</td>";


                   echo "</tr>";
                }
              } else {
                echo "0 results";
              }

              echo "<tr class='danger'>";
                echo "<td>" ."Total</td>";
                echo "<td>" ."</td>";
                echo "<td>"  ."</td>";
                echo "<td>" . $total_paid."</td>";

               echo "</tr>";




  mysqli_close($conn);
            ?>





      </tbody>
    </table>

</div>
</div>
      </div>

</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://softcareit.com/">SoftCare IT</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
