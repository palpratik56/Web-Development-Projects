<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>JNU Student Page</title>
  </head>
  <body>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        
        require 'dbcon.php';

        // Submit these to a database 
        $sql = "SELECT * FROM `user` WHERE `username`='$user' AND `password`='$pwd'";
        $res = mysqli_query($conn,$sql);
        $co = mysqli_num_rows($res);
        $login = false;
        if($co==1){
          $login = true;
        }
        else{
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         Credentials did not match. <strong>Please try again</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>';
        }
        if($login) header("location: welcome.html");
    }
?>

<div class="container mt-3">
<h2>Welcome to Login Page</h2>
    <form action="/PHP/logsys/login.php" method="post">
    <div class="form-group">
        <label>User ID</label>
        <input type="text" name="user" class="form-control" id="user" placeholder="Enter your username">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter your password"> 
    </div>
    <button type="submit" class="btn btn-outline-info">Log in</button>
    <div class="form-group mt-2">
        New User? <a href="/PHP/logsys/sign.php">Sign Up</a>
    </div>
    </form>
</div>
  </body>
</html>

