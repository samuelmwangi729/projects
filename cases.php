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
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/custom.css">
    <link rel="stylesheet" href="Assets/css/all.min.css">
    <link rel="shortcut icon" href="Assets/imgs/title.png"/>
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
      <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="container-fluid">
            <div class="container-fluid" style="text-align:center;margin-bottom:10px">
              <a href="add_convict.php" class="btn btn-primary">Add New Charges</a>
              <a href="cells.php" class="btn btn-primary">Cell Register</a>
              <a href="court.php" class="btn btn-primary">Court Details</a>
              <a href="cases.php" class="btn btn-primary active">Case OutComes</a>
              <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
              <a href="disposal.php" class="btn btn-primary">Disposal</a>
                <a href="manage.php" class="btn btn-primary">Cases List</a>
            </div>
            <?php if(isset($_POST['sub'])){
              $case=$_POST['cno'];
              $cout=$_POST['coutcome'];
              $odate=$_POST['odate'];
              $sql="update cr set cout='$cout' where cr_no='$case'";
              $sql1="update cr set outcome_date='$odate' where cr_no='$case'";
              $sql2="update cr set status='1' where cr_no='$case'";
              $qry=mysqli_query($conn,$sql);
              $qry1=mysqli_query($conn,$sql1);
              $qry1=mysqli_query($conn,$sql2);
              if($qry){
                echo "
                <div class='alert alert-success'id='alert'>
                <strong>Success</strong>&nbsp;Outcome Recorded
                </div>";
              }else{
                echo "
                <div class='alert alert-danger'id='alert'>
                <strong>Error!!!</strong>&nbsp;Outcome Not Recorded
                </div>";
              }
            }?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="height:300px;margin-top:50px;padding-top:0px"></br></br>
          <fieldset><legend style="text-align:center;font-size:46px;">Case Outcomes</legend></br>
          <div class="row">
            <div class="col-lg-4">
              <label for="Names" class="label-control">Case Number</label>
              <select name="cno" class="form-control input-md" required>
                <?php
                $c="SELECT * FROM cr";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_assoc($qr)){?>
                  <option><?php echo $ro['cr_no'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-4">
              <label for="Names" class="label-control">Case Outcome</label>
              <select name="coutcome" class="form-control input-md">
                <option>--SELECT THE OPTION--</option>
                  <option>Pending Before Court(PBC)</option>
                    <option>Pending Under Investigation</option>
                    <option>Withdrawn</option>
                    <option>Fined</option>
                    <option>Sentenced</option>
              </select>
            </div>
            <div class="col-lg-4"><label for="Names" class="label-control">Date of The Outcome</label>
            <input type="date" class="form-control input-md" name="odate" required/>
            </div>
          </div>
        </br>
          <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Record Outcome</button>
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
