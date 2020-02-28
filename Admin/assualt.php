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
      <?php include('j_sidebar.php'); ?>
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
              $officer=$_POST['officer'];
              $name=$_POST['aname'];
              $number=$_POST['anum'];
              $address=$_POST['aadd'];
              $adate=$_POST['adate'];
              $atime=$_POST['atime']." ".$_POST['daytime'];
              $assailant=$_POST['bnum'];
              $tool=$_POST['tool'];
              $sql="INSERT INTO cr(c_name,c_address,Assulted_tel,a_name,a_date,a_time,a_method,a_officer,type) VALUES('$name','$address','$number','$assailant','$adate','$atime','$tool','$officer','Assault')";
              //insert into database
              $query=mysqli_query($conn,$sql);
              if($query){
                $sql="SELECT * FROM cr";
                $query=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($query);//count the records
                $scenter="SELECT * FROM center";
                $qry=mysqli_query($conn,$scenter);
                if($r=mysqli_fetch_array($qry)){
                  $center=$r['code'];
                }
                $cro=$center."/".$count."/".date('Y');
                $ob_no=$count."/".date('d/m/Y');
                $upd="UPDATE cr SET cr_no='$cro' WHERE id='$count'";
                $upd1="UPDATE cr SET ob_no='$ob_no' WHERE id='$count'";
                $q=mysqli_query($conn,$upd);
                $q1=mysqli_query($conn,$upd1);
                echo "
                <div class='alert alert-success'id='alert'>
                <strong>Success</strong>&nbsp;Claim Added
                </div>";
            }
          }?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="height:450px;margin-top:50px;padding-top:0px"></br></br>
          <fieldset><legend style="text-align:center;font-size:46px;">Assualt Report</legend></br>
          <div class="row">
            <div class="col-lg-3">
              <label for="Names" class="label-control">Assulted Name</label>
              <input type="text" class="input-md form-control" name="aname" placeholder="Name of the Assulted"/>
            </div>
            <div class="col-lg-3">
              <label for="Names" class="label-control">Assulted Tel.No</label>
                <input type="number" class="input-md form-control" name="anum" placeholder="Phone Number of the Assulted"/>
            </div>
          <div class="col-lg-3">
          <label for="Names" class="label-control">Assulted Address</label>
            <input type="text" class="form-control input-md" name="aadd" placeholder="Enter the address" required/>
            </div>
          <div class="col-lg-3">
          <label for="Names" class="label-control">Alleged Date</label>
            <input type="date" class="form-control input-md" name="adate" required/>
          </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <label for="Names" class="label-control">Alleged Time </label>
              <input type="time" class="input-md form-control" name="atime"/>
            </div>
            <div class="col-lg-3">
              <label for="Names" class="label-control">Time Of The Day</label>
              <select name="daytime" class="form-control input-md">
                <option>AM</option>
                <option>PM</option>
              </select>
            </div>
            <div class="col-lg-3">
              <label for="Names" class="label-control">Assailant Name</label>
                <input type="text" class="input-md form-control" name="bnum" placeholder="Assailant Name"/>
            </div>
          <div class="col-lg-3">
          <label for="Names" class="label-control">Assailant Used</label>
            <input type="text" class="form-control input-md" name="tool" placeholder="What did they Attack Using" required/>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
            <label for="Names" class="label-control">Recored By:</label>
            <select name="officer" class="form-control input-md" required>
              <?php
              $c="SELECT * FROM officers";
              $qr=mysqli_query($conn,$c);
              while($ro=mysqli_fetch_assoc($qr)){?>
                <option><?php echo $ro['Rank']."\t".$ro['names'];?></option>
              <?php } ?>
            </select>
            </div>
          </div>
        </br>
          <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Record Assualt</button>
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
