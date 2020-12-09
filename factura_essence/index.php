<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
require_once("config.php");
$username = $_SESSION['username'];// customer username
if(isset($_POST['submit']))
{
    //sql injection protect
    $notroom = trim($_POST['camere']);
    $room = mysqli_real_escape_string($conn,$notroom);
    $notdays = trim($_POST['days']); //number_days
    $days = mysqli_real_escape_string($conn,$notdays);
    $notday = trim($_POST['day']); //date_day
    $day = mysqli_real_escape_string($conn,$notday);
    $notmonth = trim($_POST['month']); //date_month
    $month = mysqli_real_escape_string($conn,$notmonth);
	
	
	$hotel = 'Essence Resort'; //hotel name
	$username = $_SESSION['username'];
	if ($room == 'Apartment')
		$price = 1500;
	if ($room == 'SingleRoom')
		$price = 600;
	if ($room == 'RoyalSuite')
		$price = 4900;
    $totalprice = $price * floatval($days); //total
    if ( !($day == 31 && ($month = '2' || $month = '4' || $month = '6' || $month = '9' || $month = '9'))) 
    {
    $sql= "insert into reservation_hotel (hotel_name,username_customer,date_day,date_month,number_days,total,room) value('".$hotel."','".$username."','".$day."','".$month."','".$days."','".$totalprice."','".$room."')";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header("location:https://phpsite.space/Hotels/");
    }
    } else { echo "<script>alert('Inexistent date of the month');</script>";}
    
}

?>
<html>
    <head>
        <title>Reservation</title>
        <link rel ="stylesheet" type="text/css" href="style.css">
        <script>
            function calc()
            {
                //calculez totalul inainte sa rezerv
                var days = document.getElementById("days").value;
                var check = document.getElementById("camere").value;
                if ( check == 'Apartment')
                    {
                  var pret = 1500;}
                if ( check == 'SingleRoom')
                    {
                    var pret = 600;}
                if ( check == 'RoyalSuite')
                    {
                  var pret = 4900;}
                var total = parseFloat(days) * pret
                if (!isNaN(total))
                    document.getElementById("total").innerHTML = total
            }
        </script>
    </head>
    <body>
        <div class = "factura">
            <img src ="coolo.png" class="avatar">
            <h1>Reservation for<br>Essence Resort</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>Room Type:</p>
                <select id="camere" name="camere" oninput="calc()">
                    <option value="Apartment">Apartment</option>
                    <option value="SingleRoom">Single Room</option>
                    <option value="RoyalSuite">Royal Suite</option>
                </select>
                <p>Date for the reservation:</p>
                <select id="day" name="day">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>

                </select>
                <select id="month" name="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">Octomber</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <br>
                <p>Number of days (number)</p>
                <input type="number" id = "days" name = "days" min ="1" max ="28" oninput="calc()" placeholder="Enter the number of days">
                <p>Total :<b>$<span id="total">0</span></b></p>
                <br>
                <input type="submit" name ="submit" value = "Submit Reservation">
                <a href="https://phpsite.space/Hotel_Essence/">Back to Hotel Page</a><br>
                <a href="https://phpsite.space/Home/">Back to Home</a>
            </form>
        </div>
    </body>
</html>