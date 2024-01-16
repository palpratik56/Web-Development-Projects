<!doctype html>
<html lang="en">

<head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>JNU Student Page</title>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];

        require 'dbcon.php';
        $sign = false;
        if($_POST['pwd'] == $_POST['cpwd']){
        // Submit these to a database 
        $sql = "INSERT INTO `user` (`name`, `username`, `password`, `dt_created`) VALUES ('$name', '$user', '$pwd', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $sign =true;
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Passwords did not match 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"></span>
            </button>
          </div>';
        }
 
        if($sign){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Record inserted!</strong> You can now <a href="/PHP/logsys/login.php">Log in</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>';
        }
    }

?>

    <div class="container mt-3">
        <h2>Welcome to Signup Page</h2>
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label>User Id</label>
                <input type="text" name="user" class="form-control" id="user" placeholder="Enter your username">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter your password">
            </div>

            <div class="form-group">
                <label>Reenter Password</label>
                <input type="password" name="cpwd" class="form-control" id="cpwd"
                    placeholder="Make sure to give same password">
            </div>
            <button type="submit" class="btn btn-outline-info">Sign up</button>
        </form>
    </div>
</body>

</html>