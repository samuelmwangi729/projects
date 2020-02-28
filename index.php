<?php
require('config.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Police CRM System| Home</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/custom.css">
    <link rel="stylesheet" href="Assets/css/all.min.css">
    <link rel="shortcut icon" href="Assets/imgs/title.png"/>
    <style>
    body{
      background: url("Assets/imgs/background.jpg") no-repeat;
    }
    </style>
  </head>
  <body>
    <div class="body">
      <div class="container">
        <form  method="POST" action="login.php">
          <fieldset>
            <legend><img src="Assets/imgs/title.png"width="300px"height="150px" class="img-responsive"/></legend>
            <label for="Username" class="label-control">Username</label>
            <input type="text" name="username" class="form-control input-md" placeholder="enter the Username here" required minlength="5"/>
              <label for="Password" class="label-control">Password</label>
              <input type="password" name="password" class="form-control input-md" placeholder="enter the Password here" required minlength="8"/>
                <label for="UserLevel" class="label-control">UserLevel</label>
                <select name="userlevel" class="form-control input-md" required>
                  <?php
                  $c="SELECT * FROM ranks";
                  $qr=mysqli_query($conn,$c);
                  while($ro=mysqli_fetch_assoc($qr)){?>
                    <option><?php echo $ro['Rank'];?></option>
                  <?php } ?>
                </select>
              </br>
              <button type="submit" class="btn btn-primary btn-block" name="sub">Login</button>
              <a href="#">Forgot Password?</a>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
