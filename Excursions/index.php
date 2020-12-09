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
    <title>Excursions</title>
    <link rel="stylesheet" href ="style.css">
</head>
<body>
    <div class="container">
        <div class ="navbar">
            <img src ="logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="https://phpsite.space/Home/">HOME</a></li>
                    <li><a href="https://phpsite.space/Hotels/">HOTELS</a></li>
                    <li><a href="">EXCURSIONS</a></li>
                    <li><a href="https://phpsite.space/Profile%20Page/">PROFILE</a></li>
                    <li><a href="https://phpsite.space/logout/">LOGOUT</a></li>
                </ul>
            </nav>
            <img src = "menu.png" class = "menu-icon">
        </div>
        <div class="row">
            <div class="col">
                <h1>Excursions</h1>
                <p>Travelix presents our customers with a great variety of travels around europe with an afordable price.Fairytale castles, mysterious forests and shuttered alpine chalets, flamenco dancers in polka dots, Moorish castles standing proud, matadors with sweat on their brows the magical image of Europe. Its meadows, rivers and distinctive culture have made it a favourite with visitors who are looking for something a little bit different. </p>
            </div>
            <div class="col">
            	<a href="https://phpsite.space/aRome/">
                <div class="card card1">
                    <h5>Rome</h5>
                    <p>Italy</p>
                </div>
                </a>
                <a href="https://phpsite.space/aParis/">
                <div class="card card2">
                    <h5>Paris</h5>
                    <p>France</p>
                </div>
                </a>
                <a href="https://phpsite.space/aBarcelona/">
                <div class="card card3">
                    <h5>Barcelona</h5>
                    <p>Spain</p>
                </div>
                </a>
                <a href="https://phpsite.space/aAmsterdam/">
                <div class="card card4">
                    <h5>Amsterdam</h5>
                    <p>Netherlands</p>
                </div>
                </a>
                <a href="https://phpsite.space/aMunich/">
                <div class="card card5">
                    <h5>Munchen</h5>
                    <p>Germany</p>
                </div>
                </a>
                <a href="https://phpsite.space/aLondon/">
                <div class="card card6">
                    <h5>London</h5>
                    <p>Great Britain</p>
                </div>
                </a>
                
            </div>
        </div>
    </div>
</body>

</html>