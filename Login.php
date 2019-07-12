<?php
session_start();
include 'Connection.php';

$conn = new Connection;

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$res = $conn->getAll("SELECT * FROM user WHERE username='$username' AND password='$password';",null);
	if(count($res)){
		foreach($res as $r){
			$_SESSION['logged_id'] = $r['id'];
                        $_SESSION['username'] = $r['username'];
                        
		}
		header("location:index.php");
                
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>

<form action="" method="POST">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" name="submit" value="LogIn">
        <p>
            Not yet a member? <a href="register.php" style="color: green">Sign up</a>
  	</p>
</form>

</body>
</html>