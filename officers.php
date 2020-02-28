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
              <a href="cases.php" class="btn btn-primary">Case OutComes</a>
              <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
              <a href="disposal.php" class="btn btn-primary">Disposal</a>
                <a href="manage.php" class="btn btn-primary">Cases List</a>
            </div>
            <?php if(isset($_POST['sub'])){
              $rank=$_POST['rank'];
              $names=$_POST['oname'];
              $id=$_POST['id'];
              $phone=$_POST['pno'];
              $sql="insert into officers(Rank,names,id_card,phone) values('$rank','$names','$id','$phone')";
              $query=mysqli_query($conn,$sql);
              if($query){
                echo "
                <div class='alert alert-success'id='alert'>
                <strong>Success</strong>&nbsp;Officer Added
                </div>";
              }else{
                echo "
                <div class='alert alert-danger'id='alert'>
                <strong>Error!!!</strong>&nbsp;Not Added
                </div>";
              }
            }?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="margin-top:40px;height:300px;">
          <fieldset><legend style="text-align:center;font-size:46px;">Add A New Officer</legend></br>
          <div class="row">
            <div class="col-lg-3">
              <label for="Names" class="label-control">Officers Rank</label>
              <select name="rank" class="form-control input-md" required>
                <?php
                $c="SELECT * FROM ranks";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_assoc($qr)){?>
                  <option><?php echo $ro['Rank'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-3"><label for="Names" class="label-control">Names</label>
            <input type="text" class="form-control input-md" name="oname" required/>
            </div>
            <div class="col-lg-3"><label for="Names" class="label-control">Officers Id Number</label>
            <input type="number" class="form-control input-md"  name="id" placeholder="Id Number" required/>
            </div>
            <div class="col-lg-3">
              <label for="Names" class="label-control">Officer Phone Number</label>
              <input type="number" class="form-control input-md" name="pno" placeholder="Phone Number" required/>
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
