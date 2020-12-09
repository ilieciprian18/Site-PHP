<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
require_once("config.php");
$username = $_SESSION['username'];
$sql = "SELECT type FROM `users` WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

//$row = mysql_fetch_array($result)
//echo $row;
if ($row['type'] == "user")
    {die(header("location:https://phpsite.space/user/"));}
if ($row['type'] == "admin")
{die(header("Location:https://phpsite.space/admin/"));}

?>
<html>
<head>
</head>
<body>
</body>
</html>