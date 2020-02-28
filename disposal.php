<?php
include('config.php');
session_start();
if(isset($_SESSION['username'])){
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRM | CELLS</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/custom.css">
    <link rel="stylesheet" href="Assets/css/all.min.css">
    <link rel="shortcut icon" href="Assets/imgs/title.png"/>
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
        <?php include('sidebar.php'); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
          <div class="container-fluid">
              <div class="container-fluid" style="text-align:center;margin-bottom:10px">
                <a href="add_convict.php" class="btn btn-primary">Add New Charges</a>
                <a href="cells.php" class="btn btn-primary">Cell Register</a>
                <a href="court.php" class="btn btn-primary">Court Details</a>
                <a href="cases.php" class="btn btn-primary">Case OutComes</a>
                <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
                <a href="disposal.php" class="btn btn-primary active">Disposal</a>
                  <a href="manage.php" class="btn btn-primary">Cases List</a>
              </div>
              <?php
              if(isset($_POST['sub'])){
                $ob=$_POST['on'];
                $ddate=$_POST['ddate'];
                $dm=$_POST['dm'];
                $dt=$_POST['dt'];
                $pd=$_POST['pid'];
                $cr=$_POST['cr_no'];
                $phy=$_POST['rphy'];
                $off=$_POST['officer'];
                $sql="update cr set r_date='$ddate'  where a_id='$pd'";
                $sql1="update cr set r_time='$dt' where a_id='$pd'";
                $sql2="update cr set  r_phy='$phy'   where  a_id='$pd'";
                $sql3="update cr set r_iofficer='$off'  where  a_id='$pd'";
                $sql4="update cr set disposed='1'  where  a_id='$pd'";
                $query=mysqli_query($conn,$sql);
                $query1=mysqli_query($conn,$sql1);
                $query2=mysqli_query($conn,$sql2);
                $query3=mysqli_query($conn,$sql3);
                $query4=mysqli_query($conn,$sql4);
                if($query){
                  echo "
                  <div class='alert alert-success'id='alert'>
                  <strong>Success</strong>&nbsp;The Prisoner Disposed
                  </div>";
                }else{
                  echo "
                  <div class='alert alert-danger'id='alert'>
                  <strong>Error!!!</strong>&nbsp;Not Successful, Please Try Again
                  </div>";
                }
              }
               ?>
          <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="height:300px;margin-top:50px;">
            <fieldset><legend style="text-align:center;padding-top:0px;">Prisoner Disposal</legend>
            <div class="row">
              <div class="col-lg-3">
                <label for="Names" class="label-control">OB NUMBER</label>
                <select name="on" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM cr";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['ob_no'];?></option>
                  <?php } ?>
                </select>
                </div
              </div>  <div class="col-lg-3">
                  <label for="Names" class="label-control">Disposal Date</label>
                  <input type="date" class="form-control input-md"  name="ddate" required/>
                </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Manner of Disposal</label>
                <input type="text" class="form-control input-md" name="dm" placeholder="Enter the mode of Disposal" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Disposal Time</label>
                <input type="time" class="form-control input-md"  name="dt" required/>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label for="Names" class="label-control">Prisoner Id</label>
                <select name="pid" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM cr";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['a_id'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-3">
                <label for="Names" class="label-control">Cr Number</label>
                <select name="cr_no" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM cr";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['cr_no'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Physical Condition</label>
              <textarea class="form-control input-md" required name="rphy" rows="1"></textarea>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Officer In Charge</label>
                <select name="officer" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM officers";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['Rank']."\t".$ro['names'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div><br/>
            <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Dispose Prisoner</button>
          </fieldset>
          </form>
        </div>
      </div>
    </body>
  </html>
<?php } else{
  header("Location: /police");
}?>
