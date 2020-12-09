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
$name = trim($_POST['name']);
$q = "SELECT * FROM reservation_hotel WHERE username_customer = '".$name."'";
$r = mysqli_query($conn, $q);

$qq = "SELECT * FROM reservation_excursie WHERE username_customer = '".$name."'";
$rr = mysqli_query($conn, $qq);


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
            <h1>Admin Control Pannel</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <a href="https://phpsite.space/admincancelhotel/">
                    <input type="button" value="Cancel Reservation for Hotel"/>
                </a>
                <a href="https://phpsite.space/admincanceltrip/">
                    <input type="button" value="Cancel Reservation for Trip"/>
                </a>     
                <input type="name" name ="name" placeholder ="Enter name" required>
                <input type="submit" name ="submit" value = "Show Reservations">
                <p>
                <?php
                echo "Reservations for: ";
                echo $name;
                echo '<br>';
                echo '<br>';
                while ($roww = mysqli_fetch_assoc($r))
 		{	
 			echo "*";
 			echo "Hotel: ";
 			echo $roww["hotel_name"];
 			echo "<br>";
 			echo "Date: ";
 			echo $roww["date_day"];
 			echo ".";
 			echo $roww["date_month"];
 			echo " days: ";
 			echo $roww["number_days"];
 			echo " price: ";
 			echo $roww['total'];
 			echo "$";
 			echo "<br>";
 			echo "Room Type: ";
 			echo $roww["room"];
 			echo "<br>";
 			echo "id: ";
 			echo $roww["id"];
    			echo "<br>";
    			echo "<br>";
		 }
		 while ($rowww = mysqli_fetch_assoc($rr))
 		{	
 			echo "Location: ";
 			echo $rowww["location"];
 			echo "<br>";
 			echo " Date: ";
 			echo $rowww["date_day"];
 			echo ".";
 			echo $rowww["date_month"];
 			echo " Persons: ";
 			echo $rowww["persons"];
 			echo " Price: ";
 			echo $rowww["total"];
 			echo "$";
 			echo "<br>";
 			echo "id: ";
 			echo $rowww["id"];
 			echo "<br>";
 			echo "<br>";
 			
		 }
		 

                ?>
                </p>
                <a href="http://phpsite.space/Home/">Back to Home Page</a><br>
                <medium> The Admin Control Pannel should be used only by authorised Staff of Travelix.Use with caution!</medium>

                
            </form>
        </div>

    </body>
</html>