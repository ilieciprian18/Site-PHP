<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
$username=$_SESSION['username'];
?>
<html>
<head>
    <meta name ="viewport" content = "width=device-widthd , initial-scale=1.0" >
    <title>Home</title>
    <link rel="stylesheet" href ="style.css">
</head>
<body>
    <div class="container">
        <div class ="navbar">
            <img src ="logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="https://phpsite.space/Home/">HOME</a></li>
                    <li><a href="">HOTELS</a></li>
                    <li><a href="https://phpsite.space/Excursions/">EXCURSIONS</a></li>
                    <li><a href="https://phpsite.space/Profile%20Page/">PROFILE</a></li>
                    <li><a href="https://phpsite.space/logout/">LOGOUT</a></li>
                </ul>
            </nav>
            <img src = "menu.png" class = "menu-icon">
        </div>
        <div class="row">
            <div class="col">
                <h1>Hotels</h1>
                <p>Travelix presents our customers with a great variety of luxury Hotels at an excellent price with all sorts of services which should make your accomodation simply amazing.You could choose to reserve a room through our online payment system. </p>
            </div>
            <div class="col">
            	<a href="https://phpsite.space/Hotel_Drizzle/">
                <div class="card card1">
                    <h5>Drizzle Hotel</h5>
                    <p>Antalya,Turkey</p>
                </div>
                </a>
                <a href="https://phpsite.space/Hotel_Essence/">
                <div class="card card2">
                    <h5>Essence Resort</h5>
                    <p>Greece</p>
                </div>
                </a>
                <a href="https://phpsite.space/Hotel_Scarlet/">
                <div class="card card3">
                    <h5>Scarlet Castle Hotel</h5>
                    <p>Bulgaria</p>
                </div>
                </a>
                <a href="https://phpsite.space/Hotel_Yesteryear/">
                <div class="card card4">
                    <h5>Yesteryear Hotel</h5>
                    <p>Barcelona,Spain</p>
                </div>
                </a>
                <a href="https://phpsite.space/Hotel_Galaxy/">
                <div class="card card5">
                    <h5>Galaxy Resort</h5>
                    <p>Hawai</p>            
                </div>
                </a>
                <a href="https://phpsite.space/Hotel_Spectrum/">
                <div class="card card6">
                    <h5>Spectrum Resort</h5>
                    <p>Maldive</p>
                </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>