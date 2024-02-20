<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}
// Include config file
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if username and password are empty
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        // if the username and password are empty
        $err = "Please enter username + password";
    } else {
        // if the username and password are not empty
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if(empty($err)) {
        // my sql prepare statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        // mysqli_prepare() function prepares an SQL statement for execution.
        $stmt = mysqli_prepare($conn, $sql);
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        // Set the value of param username
        $param_username = $username;
        
        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)) {
            // store result
            mysqli_stmt_store_result($stmt);
            // if the username exists then verify the password
            if(mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt)) {
                    // verify the password
                    if(password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();
                        // Store data in session variables
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: welcome.php");
                    } else {
                        // If the password is not correct
                        $err = "The password you entered was not valid.";
                    }
                }
            } else {
                // If the username does not exist
                $err = "No account found with that username.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }    
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>PHP login system!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Login Here:</h3>
<hr>
<!-- Display error message if any -->
<?php echo $err; ?>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
