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
              require('config.php');
              // echo "831"."/".date('d/m/Y');
              $d=$_POST['date'];
              $t=$_POST['time'];
              $offence=$_POST['oname'];
              $law=$_POST['offenceLaw'];
              $cname=$_POST['cname'];
              $caddress=$_POST['caddress'];
              $aname=$_POST['anames'];
              $aid=$_POST['aid'];
              $aaddress=$_POST['aaddress'];
              $aoccupation=$_POST['aoccupation'];
              $anationality=$_POST['anationality'];
              $gender=$_POST['asex'];
              $stolen=$_POST['stolen'];
              $val=$_POST['vproperty'];
              $amethod=$_POST['amethod'];
              $age=$_POST['age'];
              $sql="INSERT INTO cr(c_date,c_time,c_name,c_address,a_name,a_id,a_address,a_occupation,a_nationality,a_age,a_sex,a_method) VALUES('$d','$t','$cname','$caddress','$aname',
              '$aid','$aaddress','$aoccupation','$anationality','$age','$gender','$amethod')";
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
                if($q && $q1){
                  header("Location: add_cell.php");
                //   echo "
                //   <div class='alert alert-success'id='alert'>
                //   <a class='close' data-dismiss='alert'>&times;</a>
                //   <strong>Details Successfully Added</strong>
                //   </div>";
                // }else{
                //   echo "
                //   <div class='alert alert-danger'>
                //   <strong>Error!!!Successfully Added</strong>
                //   </div>";
                }
              }
              // echo $d,$t,$offence,$law,$cname,$caddress,$aname,$aid,$aaddress,$aoccupation,$anationality,$gender,$stolen,$val,$amethod;
              // header("Location: cells.php");
            }
            ?>
          <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="form">
            <fieldset><legend style="text-align:center;">Charges Sheet</legend>
            <div class="row">
              <div class="col-lg-3">
                <label for="Names" class="label-control">Date of The Offense</label>
                <input type="date" class="form-control input-md"  name="date" placeholder="Enter The Name" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Time of The Offense</label>
              <input type="time" class="form-control input-md" name="time" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Offence Section</label>
              <input type="text" class="form-control input-md"  name="oname" placeholder="Enter The section" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Offence Law</label>
              <textarea class="input-md form-control" name="offenceLaw" rows="1" placeholder="Enter the Law Broken"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label for="Names" class="label-control">Complainant Names</label>
                <input type="text" class="form-control input-md" name="cname" placeholder="Enter The Name" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Complainant Address</label>
              <input type="text" class="form-control input-md"  name="caddress"placeholder="Enter The Address" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Accusd Names</label>
              <input type="text" class="form-control input-md" name="anames" placeholder="Enter The Name" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Accussed Id Number</label>
              <input type="number" name="aid" class="form-control input-md" placeholder="Eg 11223344" minlength="8" required/>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label for="Names" class="label-control">Accussed Address</label>
                <input type="text" class="form-control input-md"  name="aaddress"placeholder="Eg. 645 greenWood" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Accussed Occupation</label>
              <input type="text" class="form-control input-md"  name="aoccupation" placeholder="Eg. Farmer" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Accussed  Nationality</label>
              <input type="text" class="form-control input-md" placeholder="Or the Tribe" name="anationality" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Accussed Gender</label>
              <select name="asex" class="form-control input-md" required>
                <option>Male</option>
                  <option>Female</option>
              </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
              <label for="Names" class="label-control">Age Accussed</label>
              <input type="number" name="age"class="form-control input-md" placeholder="Enter The Age" required/>
              </div>
              <div class="col-lg-3">
                <label for="Names" class="label-control">Property</label>
                <select name="stolen" class="form-control input-md" required>
                  <option>Stolen</option>
                    <option>Recovered</option>
                </select>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Value of Property</label>
              <input type="number" name="vproperty"class="form-control input-md" placeholder="Enter The Value" required/>
              </div>
              <div class="col-lg-3"><label for="Names" class="label-control">Method Of Arrest</label>
                <select name="amethod" class="form-control input-md" required>
                  <option>Summons</option>
                  <option>Warrant</option>
                  <option>Summery</option>
                </select>
              </div>
            </div><br/>
            <button class="btn btn-block sub"type="submit" name="sub" style="background-color: #2C2D6E;color: white; font-family: cursive;font-weight:bold;">Add Occurence</button>
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
