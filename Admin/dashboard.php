<?php
include('config.php');
session_start();
if(isset($_SESSION['username'])){
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Police CRM System</title>
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/custom.css">
    <link rel="stylesheet" href="../Assets/css/all.min.css">
    <link rel="shortcut icon" href="../Assets/imgs/title.png"/>
    <style>
    .more{
      color: #2C2D6E;
    }
    .more:hover{
      font-size: 20px;
      border:1px solid red;
    }
    </style>
  </head>
    <body>
      <div class="row">
      <nav class="navbar container-fluid">
      <div class="navbar-brand">Police Crime Records Management System
        <a href="logout.php" style="float:right;text-decoration:none;">&nbsp;&nbsp;&nbsp;Sign Out</a>
        <p style="float:right">Welcome  <?php echo "<span style='color:red'>".$_SESSION['level']."</span>\t".$_SESSION['username'];?> </p>
      </div>

      </nav>
      </div>
      <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2" style="margin-left:0px;">
        <?php include('j_sidebar.php'); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="row" style="margin-top:50px;">
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Charges<sup><span class="badge badge-success">
                <?php
                $sql="SELECT * FROM cr";
                $query=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($query);
                echo $count;
                 ?>
              </span> </sup></h3>
                <a href="manage.php" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Prisoners<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM cr";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h3>
              <a href="manage.php" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Empty Cells<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM cells where status=0";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h3>
              <a href="cells_details.php" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Occupied Cells<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM cells where status=1";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h3>
              <a href="cells_details.php" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top:50px;">
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Settled Cases<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM cr where status=1";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h3>
              <a href="#" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Ongoing Cases<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM cr where status=0";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h3>
              <a href="#" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h3 style="font-weight:bold; color:#2C2D6E">Disposals<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM cr where disposed=1";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h3>
              <a href="#" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form" style="height:auto;width:auto">
              <h2 style="font-weight:bold; color:#2C2D6E">Officers<sup><span class="badge badge-success"><?php
              $sql="SELECT * FROM officers";
              $query=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($query);
              echo $count;
               ?></span> </sup></h2>
              <a href="#" class="btn btn-warning btn-block more" style="font-weight:bold;font-family:cursive">More Information</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    </body>
  </html>
<?php } else{
  header("Location: /police");
}?>
