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
    <link rel="stylesheet" href ="style2.css">
</head>
<body>
    <div class="container">
        <div class ="navbar">
            <img src ="logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="https://phpsite.space/Hotels/">HOTELS</a></li>
                    <li><a href="https://phpsite.space/Excursions/">EXCURSIONS</a></li>
                    <li><a href="https://phpsite.space/Profile%20Page/">PROFILE</a></li>
                    <li><a href="https://phpsite.space/logout">LOGOUT</a></li>
                </ul>
            </nav>
            <img src = "https://phpsite.space/Home/menu.png" class = "menu-icon">
        </div>
        <h1>Welcome <?php echo $username ?></h1>
    </div>
</body>
</html>