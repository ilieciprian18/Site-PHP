<?php 
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
require_once("config.php");
$username=$_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if ($row['type'] == "admin")
{
    die(header("location: 404.php"));
}
if ($_SESSION['tip'] == 1)
{
    die(header("location: 404.php"));
}

$location=$_SESSION['location'];
$day=$_SESSION['day'];
$month=$_SESSION['month'];
$sqll = "SELECT * FROM reservation_hotel WHERE username_customer = '".$username."' AND hotel_name='".$location."' AND date_day='".$day."' AND date_month='".$month."' ";
$resultt = mysqli_query($conn,$sqll);
$numRows = mysqli_num_rows($resultt);
if($numRows == 0)
{
	die(header("location: 404.php"));
}

$sqlll = "SELECT * FROM reservation_hotel WHERE username_customer = '".$username."' AND hotel_name='".$location."' AND date_day='".$day."' AND date_month='".$month."' ";
$resulttt = mysqli_query($conn,$sqlll);

//$v=array();
//array_push($v,"mama","tata");
//echo $v[0];
//echo $row["fname"];
//echo $row["email"];
$trclass="item-row";


                

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Hotel Reservation</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<h2 id="header">HOTEL RESERVATION</h2>
		
		<div id="identity">
		
            <h4 id="address">name:<?php echo $row['fname'];echo " ";echo $row['lname'];?><br>
email: <?php echo $row["email"];?><br>
Reservation realised on travelix site<br>

Travelix asistence: 0724456744</h3>

            <div id="logo">

              <img id="image" src="images/true.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <h1 id="customer-title">Payment Status: Not Paid</h1>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td>
    
                    <?php echo "#";
                    $total= 0;
                    while ($roww = mysqli_fetch_assoc($resultt))
                    {
                    echo $roww["id"];
                    $total = $total + $roww["total"];
                    }
                    ?>
                   
                    </td>
                </tr>
                <tr>

                    <td class="meta-head">Reservation Status</td>
                    <td>Confirmed Reservation</td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><?php echo "$";echo $total ?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Reservation Date</th>
		      <th>Hotel</th>
			  <th>Room type</th>
			  <th>Room Price</th>
		      <th>Number<br>of days</th>
		      <th>Price</th>
		  </tr>
		  <?php
		  while($rot= mysqli_fetch_assoc($resulttt))
		  {
		  $pretunitate = $rot['total'] / $rot['number_days'];
		  echo "<tr class = $trclass >";
		  echo "<td>";echo $rot['date_day']; echo ".";echo $rot['date_month']; echo"</td>";
		  echo "<td>" .$rot['hotel_name']. "</td>";
		  echo "<td>" .$rot['room']. "</td>";
		  echo "<td>$".$pretunitate. "</td>";
		  echo "<td>" .$rot['number_days']. "</td>";
		  echo "<td>";echo "$";echo $rot['total'];echo "</td>";
		  echo "</tr>";
		  }
		  
		  ?>
		  
		  
	  
		  <tr>
			  <td colspan="3" class ="blank"></td>
		      <td colspan="2" class="total-line">Total</td>
			  <td class="total-value"><div id="total"><?php echo "$";echo $total ?></div></td>
		  </tr>
		
		</table>
		
	
	</div>
	<div id ="terms">
		<h5>Terms</h5>
		<h6>This is only a reservation, the payment should be made in the desired Hotel.Travelix reserves their right to choose their clients.<br>For any wrong data please contact Travelix Staff by sedning an ticket</h6>
	</div>
	<a href="https://phpsite.space/DownloadInvoiceHotel/" style="margin:20px auto; text-align:center; display:block; width:120px;"><img src="https://selectpdf.com/buttons/save-as-pdf3.gif"/></a>
	
</body>

</html>