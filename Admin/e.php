<?php
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
        <?php include('j_sidebar.php'); ?>
        </div>
        <div class="col-lg-10">
          <div class="table-responsive" style="height:auto;">
            <span style="color:#2C2D6E;font-family:cursive;font-weight:bold;font-size:20px;">Empty Cells</span>
            <table class="table table-bordered table-striped"style="color:#2C2D6E;font-family:cursive;font-weight:bold;">
              <thead>
                <tr>
                  <td>Id Number</td>
                  <td colspan="2" style="text-align:center">More Information</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>54678837</td>
                  <td><a href="manage.php?editid=1" class="btn btn-block">View Details</a></td>
                  <td><a href="manage.php?delid=1" class="btn btn-block">Delete Record</a></td>
                </tr>
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
