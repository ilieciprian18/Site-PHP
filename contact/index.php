<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
$sql = "SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if ($row['type'] == "admin")
    {die(header("location: 404.php"));
}   

if(isset($_POST['submit']))
{

$username = $_SESSION['username'];
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$cathegory= $_POST['cathegory'];
$subject= $_POST['subject'];
$message= filter_var($_POST['textmessage'], FILTER_SANITIZE_STRING);

$mailTo = "ilieciprian18@phpsite.space";
$headers ="From: ".$email;
$formcontent="You have received a new contact request from $username \nFull Name:$name \nEmail:$email \nPhone Number:$pnumber \nCathegory:$cathegory \nSubject:$subject \nMessage:$message";

if(mail($mailTo, $subject, $formcontent, $headers))
{
header("location:https://phpsite.space/Home/");
}
else 
{
die(header("location: 404.php"));
}
}

?>
<html>
    <head>
        <title>Contact US</title>
        <link rel="stylesheet" href="contactus.css">
    </head>
    <body>
        <div class="contact-form">
            <form action="index.php" method="POST">
            <h1>Contact Us</h1>
            <div class="txtb">
                <label>Full Name:</label>
                <input type="text" name="name" placeholder="Enter your name here" required>
            </div>
            <div class="txtb">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Enter your email here" required>
            </div>
            <div class="txtb">
                <label>Phone Number:</label>
                <input type="text" name="pnumber" pattern="[0-9]+" title="Please enter only numbers" placeholder="Enter your phone number here" minlength="10" maxlength="10" required>
            </div>
            <div class="txtb">
                <label>Cathegory:</label>
                <select id="cathegory" name="cathegory">
                    <option value="Complaint">Complaint</option>
                    <option value="General Question">General Question</option>
                    <option value="Incorect user data on site">Incorect data on site</option>
                    <option value="Technical Problem">Technical Problem</option>
                    </select>
            </div>
            <div class="txtb">
                <label>Subject:</label>
                <input type="text" name="subject" placeholder="Enter your email here" required>
            </div>
            <div class="txtb">
                <label>Message:</label>
                <textarea name="textmessage" placeholder="Write a detailed description of the problem"></textarea>
            </div>
            <input type ="submit" name="submit" value="Send">
        </form>
        </div>
    </body>
</html>