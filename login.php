<?php 
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Database connection here
  $con = new mysqli("localhost","root","","database12");
  if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
  } else {
    $stmt = $con->prepare("select * from registration where username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_row > 0) {
      $data = $stmt_result->fetch_assoc();
      if($dat['password'] === $password){
        echo "<h2>Login successfully</h2>";
      } else {
        echo "<h2>Invalid Username or password</h2>";
      }
    } else {
      echo "<h2>Invalid Username or password</h2>";
    }
  }
?>