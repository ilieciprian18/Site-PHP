<?php
session_start();
if(isset($_SESSION['logat'])){
    die(header("Location:https://phpsite.space/Home/"));
}
require_once("config.php");
if(isset($_POST['submit']))
{
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

                // Google secret API
                $secretAPIkey = '6LdmsfwZAAAAAGar6r-e1-CqYE6C1PmvxWrfwzJd';

                // reCAPTCHA response verification
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);
                
    //sql injection protection
    
    $notfirstname=$_POST['fname'];
    $firstname = mysqli_real_escape_string($conn,$notfirstname);
    $notlastname=$_POST['lname'];
    $lastname = mysqli_real_escape_string($conn,$notlastname);
    $notemail=$_POST['email'];
    $email = mysqli_real_escape_string($conn,$notemail);
    $notpassword = $_POST['password'];
    $password = mysqli_real_escape_string($conn,$notpassword);
    $notusername = $_POST['username'];
    $username = mysqli_real_escape_string($conn,$notusername);
    
    
    $options = array("cost" => 4);
    $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
    
    $sqll = "select * from users where username = '".$username."'";
    $rs = mysqli_query($conn,$sqll);
    $numRows = mysqli_num_rows($rs);
    
    if($numRows == 1)
    {
    echo "Username already taken";
    }
    else {
    $sql = "insert into users (fname, lname,email, username, password) value('".$firstname."','".$lastname."','".$email."','".$username."','".$hashPassword."')";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header("location:https://phpsite.space/Login/");
    }
    
    }
    }
    
    
}
?>
<html>
    <head>
        <title>Register Form Design</title>
        <link rel ="stylesheet" type="text/css" href="style.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <div class ="registerbox">
            <img src ="avatar.png" class="avatar">
            <h1>Sign Up Here</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>First Name </p>
                <input type="fname" name = "fname" placeholder="Enter your first name" required>
                <p>Last Name</p>
                <input type="lname" name = "lname" placeholder="Enter your last name" required>
                <p>Email</p>
                <input type="email" name = "email" placeholder="Enter a valid email adress" required>
                <p>Username</p>
                <input type="username" name ="username" placeholder ="Enter a username" required>
                <p>Password</p>
                <input type="password" name = "password" placeholder="Enter a password" required>
                <div class="g-recaptcha" data-sitekey="6LdmsfwZAAAAAEoIljZh9749GxW5yrV_ml32OWR9"></div>
                <input type="submit" name ="submit" value = "Sign Up">
                <a href="https://phpsite.space/Login/">Sign in instead</a><br>
                <a href="https://phpsite.space">Back to front page</a>
            </form>
        </div>

    </body>
</html>