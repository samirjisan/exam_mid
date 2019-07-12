<?php
session_start();
if(!isset($_SESSION['logged_id'])){
    
	header("location:login.php");
//      echo "Welcome.$username";
}

include 'Connection.php';

$conn = new Connection;

//search
if(isset($_POST['src'])){
	$query = $_POST['search'];
	$result = $conn->getAll("SELECT * FROM task WHERE name LIKE '%$query%'",null);
}else{
	$result = $conn->getAll("SELECT * FROM task",null);
}


if(isset($_POST['submit'])){
	$task = $_POST['task'];
	



	$conn->insertTask($task);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>form collection</title>
</head>
<body>

	<a href="logout.php">logout</a>
        
        Welcome: <?php
        echo $_SESSION['username'];
        ?>
        

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="text" name="task" placeholder="task"><br>
		
		
		<input type="submit" name="submit" value="Insert">
	</form>

	<hr>
	<form action="" method="POST">
		<input type="text" name="search">
		<input type="submit" name="src" value="search">
	</form>
	<hr>

	<table border="1">
            
            <tr align="center" style="color:red">
            <td><b>ID</b></td>
            <td><b>Tasks</b></td>
            <td><b>Actions</b></td>
        </tr>
		<?php 
		foreach ($result as $res){
		?>
		<tr>
			<td><?php echo $res['id'] ?></td>
			<td><?php echo $res['task'] ?></td>
			
			<td><a href="edit.php?id=<?php echo $res['id']; ?>">edit</a>
			<a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $res['id']; ?>">delete</a>
                        <a href="Complete.php?id=<?php echo $res['id']; ?>" target=1><b>Mark as Done</b></a></td>
		</tr>

		<?php
		}
		?>
	</table>
        

</body>
</html>