<?php
session_start();
require('config.php');
if(isset($_POST['sub'])){
  $name=mysqli_real_escape_string($conn,$_POST['username']);
  $password=sha1($_POST['password']);
  $level=$_POST['userlevel'];
  $sql="SELECT * FROM users WHERE username='$name' AND password='$password' AND level='$level'";
  $query=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($query);
  if($count==0){
     echo "<script>alert('error');</script>";
     echo "<script>window.open('index.php','_self');</script>";
  }
  if($count==1){
    $_SESSION['username']=$_POST['username'];
    $_SESSION['level']=$_POST['userlevel'];
    echo "<script>alert('Success');</script>";
     if($_SESSION['level']=='Chief Inspector' || $_SESSION['level']=='Inspector'){
       echo "<script>window.open('dashboard.php','_self');</script>";
     }else if($_SESSION['level']=='Senior Sergent' ||$_SESSION['level']=='Sergent'){
       echo "<script>window.open('NCO/','_self');</script>";
     }
     else{
       echo "<script>window.open('Admin/dashboard.php','_self');</script>";
     }
  }else{
    echo "<script>alert('Username Not Exist');</script>";
    echo "<script>window.open('index.php','_self');</script>";
  }
  // $count=mysqli_num_rows($query);
  // if($count==1){
  //
  // }
  // else{
  //   echo "<script>window.open('index.php','_self');</script>";
  // }
}
 ?>
