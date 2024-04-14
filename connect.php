<?php
	$username = $_POST['Username'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	
	// Database connection
	$conn = new mysqli("localhost","root","","database12");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration (username, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $usernameame, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>