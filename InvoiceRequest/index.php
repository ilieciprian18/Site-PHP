<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
$sql = "SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if ($row['type'] == "admin")
{
    die(header("location: 404.php"));
}   

if(isset($_POST['submit']))
{
    $tip= $_POST['tip'];
    if($tip == 0)
    {
        $location = $_POST['Hotel'];
    }
    else 
    {
        $location = $_POST['Trip'];
    }
    $day = trim($_POST['day']);
    $month = trim($_POST['month']);
    if($tip == 0)
    {
       header("location:https://phpsite.space/InvoiceHotel/");
       $_SESSION['tip']=$tip;
       $_SESSION['day']=$day;
       $_SESSION['location']=$location;
       $_SESSION['month']=$month;
    }
    else 
    {
        header("location:https://phpsite.space/InvoiceTrip/");
        $_SESSION['day']=$day;
        $_SESSION['location']=$location;
        $_SESSION['month']=$month;
        $_SESSION['tip']=$tip;
    }

}





?>

<html>
    <head>
        <title>Invoice Request</title>
        <link rel ="stylesheet" type="text/css" href="request.css">
        <script>
            function showDiv(select)
            {
            if(select.value==0)
            {
            document.getElementById('hidden_div').style.display = "block";
            document.getElementById('hidden_div1').style.display = "none";
            } 
            if(select.value==1)
            {
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('hidden_div1').style.display = "block";
            }
            }
            
        </script>
    </head>
    <body>
        <div class ="registerbox">
            <img src ="avatar.png" class="avatar">
            <h1>Invoice Request</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>Reservation Type:</p>
                <select id="tip" name="tip" onclick="showDiv(this)">
                    <option value="0">Hotel</option>
                    <option value="1">Trip</option>
                </select>
                <p>Location:</p>
                <div id="hidden_div">
                    <select id="Hotel" name="Hotel">
                        <option value="Drizzle Hotel">Drizzle Hotel</option>
                        <option value="Essence Resort">Essence Resort</option>
                        <option value="Scarlet Castle Hotel">Scarlet Castle Hotel</option>
                        <option value="Yesteryear Hotel">Yesteryear Hotel</option>
                        <option value="Galaxy Resort">Galaxy Resort</option>
                        <option value="Spectrum Resort">Spectrum Resort</option>
                    </select>
                </div>
                <div id="hidden_div1">
                    <select id="Trip" name="Trip">
                        <option value="London">London</option>
                        <option value="Rome">Rome</option>
                        <option value="Paris">Paris</option>
                        <option value="Munich">Munich</option>
                        <option value="Amsterdam">Amsterdam</option>
                        <option value="Barcelona">Barcelona</option>
                    </select>
                </div>
                <p>Date:</p>
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
                <p></p>
                <br>
                <input type="submit" name="submit" value = "Get Invoice">
            </form>
            <a href="https://phpsite.space/contact/">Contact us!</a><br>
            <a href="https://phpsite.space/user/">Back to Profile</a><br>
            <a href="https://phpsite.space/Home/">Back to Home Page</a><br><br>
            <medium>Please verify the data that you have introduced in case of an error:404.If the error persists please contact the Travelix Staff.</medium>
            
        </div>

    </body>
</html>