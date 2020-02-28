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
  </head>
    <body>
      <div class="row">
      <nav class="navbar container-fluid">
        <div class="navbar-brand"><a href="dashboard.php">Police Crime Records Management System</a>
          <a href="logout.php" style="float:right;text-decoration:none;">&nbsp;&nbsp;&nbsp;Sign Out</a>
        <p style="float:right">Welcome  <?php echo "<span style='color:red'>".$_SESSION['level']."</span>\t".$_SESSION['username'];?> </p>
        </div>
      </nav>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
        <?php include('sidebar.php'); ?>
        </div>
        <div class="col-lg-10">
          <div class="container-fluid" style="text-align:center;margin-bottom:10px">
            <a href="add_convict.php" class="btn btn-primary">Add New Charges</a>
            <a href="cells.php" class="btn btn-primary">Cell Register</a>
            <a href="court.php" class="btn btn-primary">Court Details</a>
            <a href="cases.php" class="btn btn-primary">Case OutComes</a>
            <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
            <a href="disposal.php" class="btn btn-primary">Disposal</a>
            <a href="manage.php" class="btn btn-primary">Cases List</a>
          </div>
          <div class="table-responsive" style="height:auto;">
            <span style="color:#2C2D6E;font-family:cursive;font-weight:bold;font-size:18px">A list of Assualts Claims</span>
            <table class="table table-bordered table-striped"style="color:#2C2D6E;font-family:cursive;font-weight:bold;">
              <thead>
                <tr>
                  <td class="text-center">Last 5 Assault Claims</td>
                </tr>
              </thead>
              <tbody>
                <?php
                $c="SELECT * FROM cr  where type='Assault' ORDER BY id DESC LIMIT 5";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_array($qr)){?>
                <tr>
                  <td><?php  echo "<span style='text-decoration:underline'>OB Number:" .$ro['ob_no']."</span><br>To the Station is one ".$ro['c_name']." of Telephone Number ".$ro['Assulted_tel']." and a resident of ".$ro['c_address'].", now reports that on  ".$ro['a_date']." at
                  Around<br>".$ro['a_time']." he was assaulted by one ".$ro['a_name']." by use of ".$ro['a_method'].". He is Now Seeking Police Assistance.";
                   ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </body>
  </html>
<?php } else{
  header("Location: /police");
}?>
