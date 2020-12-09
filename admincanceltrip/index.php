<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
require_once("config.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if ($row['type'] == "user")
    {die(header("location: 404.php"));}

if(isset($_POST['submit']))
{
    // Nu trebuie securizata data impotriva SQL injection deoarece inputul este safe
    // Imputul provine de la trusted users cu drept de admin
    $idd = trim($_POST['id']);
    $id = floatval($idd);
    $q = "DELETE FROM reservation_excursie WHERE id='$id'";
    $r = mysqli_query($conn, $q);
    if($r)
    {die(header("location:https://phpsite.space/admin/"));;}
    
}
?>
<html>
    <head>
        <title>Admin Control Pannel</title>
        <link rel ="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class ="registerbox">
            <img src ="avatar.png" class="avatar">
            <h1>Admin Control Pannel<br>Cancel Reservation for Trip</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="number" name ="id" placeholder ="Enter the id for the reservation" required>
                <input type="submit" name ="submit" value = "Delete Reservation">
                <a href="https://phpsite.space/admin/">Back</a><br>
                <medium> The Admin Control Pannel should be used only by authorised Staff of Travelix.Use with caution!</medium>

                
            </form>
        </div>

    </body>
</html>