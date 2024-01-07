<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location:index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Fixed Layout</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
      <span class="logo-mini"><b>K</b>A</span>
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
    <?php include_once "menu.php"; ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="container" >
    <div class="row" style="margin-right:30px">


      <div class="col-lg-12 col-md-12 " style="padding:10px;border:1px solid #9C9C9C;margin-bottom:5px;border-radius:10px;">
              <form method="post" action="dead_bird_entry_done.php" enctype="multipart/form-data">


                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="pwd">dead_bird Quantity:</label>
                      <input  type="number" name="total_bird"  class="form-control" id="pwd">
                    </div>

                  </div>
              <!--    <div class="col-md-3">
                    <div class="form-group">
                      <label for="pwd">dead_bird Quantity:</label>
                      <input  type="number" name="dead_bird"  class="form-control" id="pwd">
                    </div>
                  </div>
-->                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="pwd">Narration:</label>
                      <input  type="text" name="narration"  class="form-control" id="pwd">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="pwd">Production Date:</label>
                      <input  type="date" name="date" placeholder="" class="form-control" id="pwd">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <button style="margin-top:25px" type="submit" name="submit"  class="btn btn-info">Entry</button>
            </div>
                  </div>

                </div>


          </form>
<?php
        include_once "../../connection.php";
        if(isset($_POST['search'])){
                    $search=$_POST['search'];
                    $sql = "SELECT * FROM dead_bird where total_egg like '%$search%' or defect_egg like '%$search%' ";

                }else if(isset($_POST['fromdate']) && isset($_POST['todate'])){
                  $fromdate=$_POST['fromdate'];
                  $todate=$_POST['todate'];
                  if($todate!=''){
                    $sql = "SELECT sum(quantity) as total_dead_bird  FROM dead_bird where date between '$fromdate' and '$todate' ";
                  }else{
                    $sql = "SELECT sum(quantity) as total_dead_bird FROM dead_bird where date ='$fromdate' ";
                  }

  }else{
                  $sql = "SELECT sum(quantity) as total_dead_bird FROM dead_bird";
        }



$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $total_dead_bird=$row['total_dead_bird'];

    }
} else {
    echo "0 results";
}


$sql = "SELECT sum(quantity) as total_dead_bird FROM dead_bird";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$dead_bird=$row['total_dead_bird'];

}
} else {
echo "0 results";
}



$sql = "SELECT sum(quantity) as total_bird FROM bird";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$total_bird=$row['total_bird'];

}
} else {
echo "0 results";
}


 ?>


      </div>

    </div>

    </div>

    <section class="content">
      <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">

                   <div class="row">
               <div class="col-md-8 col-sm-8">
                 <form class="" action="dead_bird.php" method="post">
                   <div class="row">
                     <div class="col-md-5">
                       <div class="form-group ">
                              <input type="date" name="fromdate"  class="form-control" value="">
                           </div>
                     </div>
                     <div class="col-md-2">
                       TO
                     </div>
                     <div class="col-md-5">

                       <div class="form-group ">
                              <input type="date" name="todate"  class="form-control" value="">
                           </div>
                     </div>
                   </div>


               </div>


               <div class="col-md-2 col-sm-2">
                 <input type="submit" class="btn btn-danger" name="submit" value="Report">
                  </form><a style="float:right" href=""  title="pdf download" class="btn btn-info" onclick="PrintElem('myDivToPrint')"> <i class="glyphicon glyphicon-print"></i> </a>
               </div>

<div class="col-md-1">

</div>
               <form class="" action="dead_bird.php" method="post">

               </form>

           </div>


               </div>
           </div>

       </div>


   </div>
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
      <div class="table-wrapper-scroll-x" id="myDivToPrint">

                  <div class="row">
                    <div class="col-md-3">
                      <h3>Total dead bird : <?php echo $total_dead_bird;  ?></h3>
                    </div>
                    <div class="col-md-3">
                      <h3>remaining bird : <?php echo $total_bird-$dead_bird;  ?></h3>
                    </div>

                  </div>
        <table class="table" border='1' style="width: 100% ; border:1px solid black;border-collapse: collapse;">
            <thead>

              <tr class="danger">
                <td>Date</td>
                <td>dead_bird</td>

                
                <td>narration </td>

                <td></td>

              </tr>

              <?php
                include_once "../../connection.php";
                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                if(isset($_POST['search'])){
                            $search=$_POST['search'];
                            $sql = "SELECT * FROM dead_bird where quantity like '%$search%' or dead_bird like '%$search%' ";

                        }else if(isset($_POST['fromdate']) && isset($_POST['todate'])){
                          $fromdate=$_POST['fromdate'];
                          $todate=$_POST['todate'];
                          if($todate!=''){
                            $sql = "SELECT * FROM dead_bird where date between '$fromdate' and '$todate' ";
                          }else{
                            $sql = "SELECT * FROM dead_bird where date ='$fromdate' ";
                          }

}else{
                          $sql = "SELECT * FROM dead_bird order by dead_bird_id desc";
                        }

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
          $age="no";
                        echo "<tr class='info'>";

            echo "<td>" . $row["date"]."</td>";

                                      echo "<td>" . $row["quantity"]."</td>";

                                          echo "<td>" .$row['narration']."</td>";
                          echo '<td><a title="delete" onclick="return check();" href="dead_bird_delete.php?id='.$row['dead_bird_id']. '"class="btn btn-danger btn-sm">
          <span class="glyphicon glyphicon-trash">
          <a title="edit" href="dead_bird_edit.php?id='.$row['dead_bird_id']. '"class="btn btn-info btn-sm">
<span class="glyphicon glyphicon-pencil"></span>
        </a>
</td>';
                        echo "</tr>";
                      }
                    } else {
                      echo "0 results";
                    }

                    mysqli_close($conn);


                  ?>

            </tbody>
          </table>

      </div>

    </section>
    <!-- /.content -->
  </div>


  <script type="text/javascript">
  function check(){

      return confirm("Are you sure you want to delete?");

  }

  </script>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://softcareit.com/">Softcare IT</a>.</strong> All rights
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
