<?php
session_start();
include '../connection/conn.php';
if(!isset($_SESSION['uid'])){
header('location: ../');
}
if(isset($_POST['logout'])){
    session_destroy();
    header('location: ../index.php');
}
if(isset($_POST['online'])){
    mysqli_query($con,"UPDATE login set status='Online'");
    echo "The Account is now Online";
}
if(isset($_POST['offline'])){
    mysqli_query($con,"UPDATE login set status='Offline'");
    mysqli_query($con, "UPDATE login set status='Online' WHERE id='".$_SESSION['uid']."'");
    echo "The Account is now Offline";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Welcome</h1>
    <form action="" method="POST">
    <button type="submit" name="online">Online</button>
    <button type="submit" name="offline">Offline</button>
    <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>