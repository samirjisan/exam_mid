<?php
session_start();
if(!isset($_SESSION['logged_id'])){
	header("location:login.php");
}
include 'Connection.php';
$conn = new Connection;
$getId = $_GET['id'];
$res = $conn->getAll("SELECT * FROM task WHERE id=$getId",NULL);

foreach ($res as $r2){
    $task = $r2['task'];
    $conn->insertCompleteTask($task);
}
$conn->updateTable("DELETE FROM task WHERE id=$getId",NULL);
//Search
if(isset($_POST['src'])){
    $query = $_POST['search'];
    $result = $conn->getAll("SELECT * FROM done WHERE task LIKE '%$query%'",null);
}else{
    $result = $conn->getAll("SELECT * FROM done",null);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tasks Completed</title>
    
</head>
<body>
    <table align="right">
        <tr>
            <td style="color:green;">Logged in As: <b> <?php echo $_SESSION['username']; ?> </b> || 
                <a href="logout.php"><b>logout</b></a></td>
        </tr>
    </table>
    <br><br>
    <table border="1" align="center">
        <tr align="center" style="color:green">
            <td><b>ID</b></td>
            <td><b>Completed Tasks</b></td>
        </tr>
        <?php
            foreach($result as $r){
        ?>
        <tr align="center">
            <td><?php echo $r['id']; ?></td>
            <td><?php echo $r['task']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <p>
          <a href="index.php" style="color: green">Home</a>
  	</p>
</body>
</html>