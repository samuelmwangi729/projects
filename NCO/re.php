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
      <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="container-fluid">
            <div class="container-fluid" style="text-align:center;margin-bottom:10px">
              <a href="add_convict.php" class="btn btn-primary">Add New Charges</a>
              <a href="cells.php" class="btn btn-primary">Cell Register</a>
              <a href="court.php" class="btn btn-primary">Court Details</a>
              <a href="cases.php" class="btn btn-primary">Case OutComes</a>
              <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
              <a href="disposal.php" class="btn btn-primary">Disposal</a>
                <a href="manage.php" class="btn btn-primary">Cases List</a>
            </div>
            <?php if(isset($_POST['sub'])){
              $case=$_POST['cno'];
              $rem=$_POST['remarks'];
              $sql="update cr set remarks='$rem' where cr_no='$case'";
              $qry=mysqli_query($conn,$sql);
              if($qry){
                echo "
                <div class='alert alert-success'id='alert'>
                <strong>Success</strong>&nbsp;Remarks  Added
                </div>";
              }else{
                echo "
                <div class='alert alert-danger'id='alert'>
                <strong>Error</strong>&nbsp;Remarks Not Added
                </div>";
              }
            }?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="padding-top:10px;"></br></br>
          <fieldset><legend style="text-align:center;font-size:46px;">Case Number</legend></br>
          <div class="row">
            <div class="col-lg-3">
              <label for="Names" class="label-control" style="margin-top:35px">Case Number</label>
              <select name="cno" class="form-control input-md" required>
                <?php
                $c="SELECT * FROM cr";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_assoc($qr)){?>
                  <option><?php echo $ro['cr_no'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-9"><label for="Names" class="label-control">Remarks</label>
            <textarea class="form-control input-lg" name="remarks" required rows="5"></textarea>
            </div>
          </div>
        </br>
          <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Record Statement</button>
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
