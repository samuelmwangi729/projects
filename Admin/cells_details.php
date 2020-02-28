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
        <div class="col-lg-10">
          <?php
          if(isset($_POST['sub'])){
            $cno=$_POST['cell'];
            $sql="INSERT INTO cells(number)values('$cno')";
            $qry=mysqli_query($conn,$sql);
            if($qry){
              echo "
              <div class='alert alert-success'id='alert'>
              <strong>Success</strong>&nbsp;New Cell Added
              </div>";
            }else{
              echo "
              <div class='alert alert-danger'id='alert'>
              <strong>Error</strong>&nbsp;No Cell Added
              </div>";
            }
          }
           ?>
          <div class="container-fluid" style="text-align:center;margin-bottom:10px">
              <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <fieldset>
                  <legend style="color:#2C2D6E;font-family:cursive;font-weight:bold;">Add a new Cell</legend>
                  <div class="row">
                    <div class="col-lg-3">
                      <label for="cell" class="label-control">Cell Number</label>
                      <input type="text" class="input-md form-control" placeholder="Enter the Cell Number" name="cell" required/>
                    </div>
                    <div class="col-lg-9">
                      <button type="submit" style="margin-top:30px;" name="sub" class="btn btn-primary btn-block" >Add a cell</button>
                    </div>
                  </div>
                </fieldset>
              </form>
          </div>
          <div class="table-responsive" style="height:auto;">
            <span style="color:#2C2D6E;font-family:cursive;font-weight:bold;font-size:20px;">Cell Details</span>
            <table class="table table-bordered table-striped"style="color:#2C2D6E;font-family:cursive;font-weight:bold;">
              <thead>
                <tr>
                  <td>Cell Number</td>
                  <td>Current Status</td>
                </tr>
              </thead>
              <tbody>
                <?php
                $c="SELECT * FROM cells ORDER BY number DESC LIMIT 6";
                $qr=mysqli_query($conn,$c);
                while($ro=mysqli_fetch_array($qr)){
                  $n=$ro['number'];
                  //count the prisoners assigned a cell
                  ?>
                <tr>
                  <td><?php echo $n;?></td>
                  <?php if($ro['status']==0){
                    echo "<td style='color:green'>Empty</td>";
                  }else{
                    echo "<td style='color:red'>Occupied</td>";
                  }
                  ?>
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
