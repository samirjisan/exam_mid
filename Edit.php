<?php
include 'Connection.php';
$conn = new Connection;
$getId = $_GET['id'];
$res = $conn->getAll("SELECT * FROM task WHERE id=$getId",NULL);
//print_r($res);
//UPDATE Method
if(isset($_POST['submit'])){
    $task = $_POST['task'];
    $data = array(
        ':task' => $task,
    );
    $conn->update("UPDATE task SET task=:task WHERE id=$getId",$data);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>edit</title>
</head>
<body>
    <form action="" method="POST">
        <?php
            foreach($res as $r){
        ?>
        <input type="text" name="task" value="<?php echo $r['task']; ?>"><br>
        <input type="submit" name="submit" value="Update"><br>
        <?php
            }
        ?>
    </form>
</body>
</html>