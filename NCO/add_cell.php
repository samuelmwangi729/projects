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
        <div class="col-lg-10 col-md-10 col-sm-10" style="padding-top:0px;">
        <div class="container-fluid">
            <div class="container-fluid" style="text-align:center;margin-bottom:10px">
              <a href="add_convict.php" class="btn btn-primary active">Add New Charges</a>
              <a href="cells.php" class="btn btn-primary">Cell Register</a>
              <a href="court.php" class="btn btn-primary">Court Details</a>
              <a href="cases.php" class="btn btn-primary">Case OutComes</a>
              <a href="ct.php" class="btn btn-primary">Cell Transfers</a>
              <a href="disposal.php" class="btn btn-primary">Disposal</a>
                <a href="manage.php" class="btn btn-primary">Cases List</a>
            </div>
            <?php
            if(isset($_POST['sub'])){
              // echo "831"."/".date('d/m/Y');
              $c=$_POST['cell_no'];
              $id=$_POST['pid'];
              $d=$_POST['date'];
              $t=$_POST['atime'];
              $C=$_POST['pcond'];
              $officer=$_POST['officer'];
              $f="UPDATE cells SET status=1 where number='$c'";
              $a="UPDATE cr SET a_cell='$c' WHERE a_id='$id'";
              $b="UPDATE cr SET a_date='$d' WHERE a_id='$id'";
              $c="UPDATE cr SET a_time='$t' WHERE a_id='$id'";
              $d="UPDATE cr SET a_phy='$C' WHERE a_id='$id'";
              $e="UPDATE cr SET a_officer='$officer' WHERE a_id='$id'";

              //insert into database
              $query=mysqli_query($conn,$f);
              $query1=mysqli_query($conn,$a);
              $query2=mysqli_query($conn,$b);
              $query3=mysqli_query($conn,$c);
              $query4=mysqli_query($conn,$d);
              $query5=mysqli_query($conn,$e);

              if($query5){
                echo "
                <div class='alert alert-success'id='alert'>
                <a class='close' data-dismiss='alert'>&times;</a>
                <strong>Details Successfully Added</strong>
                </div>";
              }else{
                echo "
                <div class='alert alert-danger'>
                <strong>Error!!!Not Added</strong>
                </div>";
              }
              // echo $d,$t,$offence,$law,$cname,$caddress,$aname,$aid,$aaddress,$aoccupation,$anationality,$gender,$stolen,$val,$amethod;
              // header("Location: cells.php");
            }
            ?>
          <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form" style="height:300px">
            <fieldset><legend style="text-align:center;">Cell Registry</legend>
            <div class="row">
              <div class="col-lg-4">
                <label for="Names" class="label-control">Cell Number</label>
                <select name="cell_no" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM cells";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['number'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-4"><label for="Names" class="label-control">Prisoner ID</label>
                <select name="pid" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM cr";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['a_id'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-4"><label for="Names" class="label-control">Admission Date</label>
              <input type="date" class="form-control input-md"  name="date" placeholder="Enter The Name" required/>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4"><label for="Names" class="label-control">Time Of Admission</label>
              <input type="time" class="form-control input-md" name="atime" required/>
              </div>
              <div class="col-lg-4">
                <label for="Names" class="label-control">Physical Condition</label>
                <input type="text" class="form-control input-md"  name="pcond"placeholder="Physical State" required/>
              </div>
              <div class="col-lg-4"><label for="Names" class="label-control">Officer In Charge</label>
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
            <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;margin-top:20px">Add Occurence</button>
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
