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
      <div class="navbar-brand">Police Crime Records Management System
        <a href="logout.php" style="float:right;text-decoration:none;">&nbsp;&nbsp;&nbsp;Sign Out</a>
        <p style="float:right">Welcome  <?php echo "<span style='color:red'>".$_SESSION['level']."</span>\t".$_SESSION['username'];?> </p>
      </div>

      </nav>
      </div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
        <?php include('j_sidebar.php'); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
          <div class="container-fluid">
              <div class="container-fluid" style="text-align:center;margin-bottom:10px">
                <a href="add_convict.php" class="btn btn-primary">Add New Charges</a>
                <a href="cells.php" class="btn btn-primary">Cell Register</a>
                <a href="court.php" class="btn btn-primary">Court Details</a>
                <a href="cases.php" class="btn btn-primary">Case OutComes</a>
                <a href="ct.php" class="btn btn-primary active">Cell Transfers</a>
                <a href="disposal.php" class="btn btn-primary">Disposal</a>
              <a href="manage.php" class="btn btn-primary">Cases List</a>
              </div>
              <?php
              if(isset($_POST['sub'])){
                $prisoner=$_POST['pid'];
                $nc=$_POST['nc'];
                $sql="update cr set cell_transfer='$nc' WHERE a_id='$prisoner'";
                $sql1="update cells set status='1' where number='$nc'";
                $query=mysqli_query($conn,$sql);
                $query1=mysqli_query($conn,$sql1);
                if($query){
                  echo "
                  <div class='alert alert-success'id='alert'>
                  <strong>Success</strong>&nbsp;Prissoner Transferred
                  </div>";
                }else{
                  echo "
                  <div class='alert alert-danger'id='alert'>
                  <strong>Error!!!</strong>&nbsp;Not Successful
                  </div>";
                }
              }
               ?>
              <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="height:300px;margin-top:50px;padding-top:0px"></br></br>
                <fieldset><legend style="text-align:center;font-size:46px;">Cell Transfers</legend></br>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="Names" class="label-control">Prisoner Id Number</label>
                    <select name="pid" class="form-control input-md" required>
                      <?php
                      $c="SELECT * FROM cr";
                      $qr=mysqli_query($conn,$c);
                      while($ro=mysqli_fetch_assoc($qr)){?>
                        <option><?php echo $ro['a_id'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-lg-6">
                    <label for="Names" class="label-control">New Cell</label>
                    <select name="nc" class="form-control input-md" required>
                      <?php
                      $c="SELECT * FROM cells";
                      $qr=mysqli_query($conn,$c);
                      while($ro=mysqli_fetch_assoc($qr)){?>
                        <option><?php echo $ro['number'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </br>
                <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Transfer Prisoner</button>
                <input type="hidden"/>
              </br>
              </fieldset>
              </form>
        </div>
      </div>
    </body>
  </html>
<?php } else{
  header("Location: /police");
}?>
