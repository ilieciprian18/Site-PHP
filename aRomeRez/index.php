<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
require_once("config.php");
$username = $_SESSION['username'];//username customer
if(isset($_POST['submit']))
{
     //sql injection protection
    $notdays = trim($_POST['days']); //persons
    $days =mysqli_real_escape_string($conn,$notdays);
    $notday = trim($_POST['day']); // date day
    $day = mysqli_real_escape_string($conn,$notday);
    $notmonth = trim($_POST['month']);// date month
    $month = mysqli_real_escape_string($conn,$notmonth);
    
    $location = 'Rome'; //locatie
    $price = 1800;
    echo $days;
    echo $day;
    echo $month;
    $totalprice = $price * floatval($days); //total
    $sql= "insert into reservation_excursie (username_customer,location,persons,total,date_day,date_month) value('".$username."','".$location."','".$days."','".$totalprice."','".$day."','".$month."')";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header("Location:https://phpsite.space/Excursions/");
    }
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
                var pret = 1800;
                var total = parseFloat(days) * pret
                if (!isNaN(total))
                    document.getElementById("total").innerHTML = total
            }
        </script>
    </head>
    <body>
        <div class = "factura">
            <img src ="coolo.png" class="avatar">
            <h1>Reservation for<br>Rome<br>-Weekly Trips-</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>Date for the reservation:</p>
                <select id="day" name="day">
                    <option value="3">3</option>
                    <option value="9">9</option>
                    <option value="16">16</option>
                    <option value="23">23</option>

                </select>
                <select id="month" name="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">Mai</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">Octomber</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <br>
                <p>Number of persons (number)</p>
                <input type="number" id = "days" name = "days" min ="1" max ="10" oninput="calc()" placeholder="Enter the number of persons">
                <p>Total :<b>$<span id="total">0</span></b></p>
                <br>
                <input type="submit" name ="submit" value = "Submit Reservation">
                <a href="https://phpsite.space/aRome/">Back to Rome Trip</a><br>
                <a href="https://phpsite.space/Excursions/">Back to Excursions</a>
            </form>
        </div>
    </body>
</html>