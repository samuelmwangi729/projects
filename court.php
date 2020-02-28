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
              <a href="court.php" class="btn btn-primary active">Court Details</a>
              <a href="cases.php" class="btn btn-primary">Case OutComes</a>
              <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
              <a href="disposal.php" class="btn btn-primary">Disposal</a>
                <a href="manage.php" class="btn btn-primary">Cases List</a>
            </div>
            <?php if(isset($_POST['sub'])){
              $id=$_POST['pid'];
              $d=$_POST['cdate'];
              $court=$_POST['court'];
              $cfile=$_POST['cfile'];
              $cro=$_POST['cro'];
              $inv=$_POST['investigator'];
              $hcl=$_POST['hcl'];
              $a="UPDATE cr SET court_name='$court' WHERE a_id='$id'";
              $b="UPDATE cr SET court_file_number='$cfile' WHERE a_id='$id'";
              $c="UPDATE cr SET cdo='$cro' WHERE a_id='$id'";
              $d="UPDATE cr SET investigator='$inv' WHERE a_id='$id'";
              $e="UPDATE cr SET hcl='$hcl' WHERE a_id='$id'";
              //insert into database
              $query=mysqli_query($conn,$a);
              $query=mysqli_query($conn,$b);
              $query=mysqli_query($conn,$c);
              $query=mysqli_query($conn,$d);
              $query=mysqli_query($conn,$e);
              if($query){
                echo "
                <div class='alert alert-success'id='alert'>
                <a class='close' data-dismiss='alert'>&times;</a>
                <strong>Details Successfully Added</strong>
                </div>";
              }
            }?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form"></br></br>
          <fieldset><legend style="text-align:center;font-size:46px;">Court Attendance Details</legend></br>
            <div class="row-fluid">
                <label for="Names" class="label-control">Court Appearing BEfore</label>
                <input type="text"  class="form-control input-md" name="court" placeholder="Enter the Name of the Court" required/>
            </div>
          <div class="row">
            <div class="col-lg-4">
              <label for="Names" class="label-control">Accussed Id Number</label>
              <select name="pid" class="form-control input-md" required>
                <?php
                $c="SELECT * FROM cr";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_assoc($qr)){?>
                  <option><?php echo $ro['a_id'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-4"><label for="Names" class="label-control">Court Appearance Date</label>
            <input type="date" class="form-control input-md" name="cdate" required/>
            </div>
            <div class="col-lg-4"><label for="Names" class="label-control">Court File Number</label>
            <input type="text" class="form-control input-md"  name="cfile" placeholder="Court File Number" required/>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <label for="Names" class="label-control">CRO DOCKET NUMBER</label>
              <input type="text" class="form-control input-md" name="cro" placeholder="CRO DOCKET NUMBER" required/>
            </div>
            <div class="col-lg-4"><label for="Names" class="label-control">Investigator</label>
              <select name="investigator" class="form-control input-md" required>
                <?php
                $c="SELECT * FROM officers";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_assoc($qr)){?>
                  <option><?php echo $ro['Rank']."\t".$ro['names'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-4"><label for="Names" class="label-control">Hollerith Code Letter</label>
            <input type="text" class="form-control input-md" name="hcl" placeholder="Hollerith Code Letter" required/>
            </div>
          </div>
        </br>
          <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Add to Records</button>
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
