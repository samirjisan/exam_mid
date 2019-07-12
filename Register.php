<?php
include 'Connection.php';
$conn = new Connection;
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $data = array(
        ':username' => $username,
        ':password' => $password,
        ':status' => 1
    );
    $conn->update("INSERT INTO user (username,password,status) VALUES (:username,:password,:status)",$data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <form action="" method="POST">
        
            <table>
        <td>
        UserName:<input type="text" name="username"><br>
        </td>
        <td>
        Password:<input type="password" name="password"><br>
        </td>
        <td>
        <input type="submit" name="submit" value="Register"><br>
        </td>
        <p>
        <td>
            Already a member? <a href="Login.php" style="color: red">Sign in</a>
        </td>
  	</p>
            </table>
    </form>
</body>
</html>