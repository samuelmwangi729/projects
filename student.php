<?php
$conn=mysqli_connect("localhost","root","","test1");
if(!$conn){
  die();
}
if(isset($_POST['sub'])){
  $name=$_POST['sname'];
  $adm=$_POST['sadmin'];
  echo $name."<br>".$adm;
  $sql="INSERT INTO student(username,admission) VALUES('$name','$adm')";//
  $insert=mysqli_query($conn,$sql);
  if($insert){
    echo "</br>Inserted";
  }else{
    echo "</br>Not Inserted";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
      <label>Username</label>
      <input type="text" name="sname" placeholder="Enter The Username"/></br>
      <label>Admission</label>
      <input type="text" name="sadmin" placeholder="Enter The Adm"/></br>
      <button type="submit" name="sub">Submit</button>
    </form>
  </body>
</html>
