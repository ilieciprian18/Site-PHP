<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
if ($row['type'] == "admin")
	{die(header("location: 404.php"));}
require_once("config.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$q = "SELECT * FROM reservation_hotel WHERE username_customer = '".$username."'";
$r = mysqli_query($conn, $q);

$qq = "SELECT * FROM reservation_excursie WHERE username_customer = '".$username."'";
$rr = mysqli_query($conn, $qq);



?>
<html>
    <head>
        <title>User Profile Page</title>
        <link rel ="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class ="registerbox">
            <img src ="avatar.png" class="avatar">
            <h1>Profile Page<br>of<br><?php echo $username ?></h1>
            <form>
                <p>First name:<?php echo $row['fname'] ?></p>
                <p>Last name:<?php echo $row['lname'] ?></p>
                <p>Asigned email:<?php echo $row['email'] ?></p>
                <p>Username:<?php echo $row['username'] ?></p>
                <p>Reservations:<br>
                <?php
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
 			
		 }
		 

                ?>
                </p>
                <a href="http://phpsite.space/Home/">Back to Home Page</a><br>
                <a href="">Contact us! (cooming soon)</a><br>
                <medium> For any wrong information/canceling any reservation please contact our staff</medium>

                
            </form>
        </div>

    </body>
</html>