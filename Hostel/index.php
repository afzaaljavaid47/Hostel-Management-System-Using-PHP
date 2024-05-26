<!DOCTYPE html>
<html lang="en">

<head>
<title>HMS</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="web/css/style.css" rel="stylesheet" type="text/css" />
<link href="web/css/fontawesome-all.css" rel="stylesheet" />
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

</head>

<body>
<h1>Hostel Management System</h1>
<div class=" w3l-login-form">
<h2>Customer Login</h2>

<form method="POST">
<div class=" w3l-form-group">
<label>Customer E-Mail:</label>
<div class="group">
<i class="fas fa-envelope"></i>
<input type="text" class="form-control" name="email" placeholder="E-Mail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="E-Mail is not in correct Format"/>
</div>
</div>
<div class="w3l-form-group">
<label>Password:</label>
<div class="group">
<i class="fas fa-unlock"></i>
<input type="password" class="form-control" name="password" placeholder="Password" required="required" minlength="8" title="Password Must be 8 Digit Long" />
</div>
</div>
<button type="submit" name="login">Login</button>
</form>
<p class=" w3l-register-p">Login as<a href="login-hostel_manager.php" class="register"> Hostel-Manager/Admin</a></p>
<p class=" w3l-register-p">Don't have an account?<a href="signup.php" class="register"> Sign up</a></p>
<p class=" w3l-register-p">Forget Password?<a href="Reset_Password" class="register"> Reset now</a></p>
</div>
<footer>
<p class="copyright-agileinfo"> &copy; 2020 Hostel Management System. All Rights Reserved</p>
</footer>

</body>

</html>
<?php

if (isset($_POST['login-submit']))
{
require 'includes/config.inc.php';
$roll = $_POST['student_roll_no'];
$password = $_POST['pwd'];
$sql = "SELECT * FROM `userregistration` WHERE `regNo`='$roll' AND `password`='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0) 
{
header("Location: user/dashboard.php");
}
else 
{
?>
<script type="text/javascript">
alert("Login Deatils Not Match System Details. Try Again !");
</script>
<?php
}
}
?>


<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
$stmt->bind_param('ss',$email,$password);
$stmt->execute();
$stmt -> bind_result($email,$password,$id);
$rs=$stmt->fetch();
$stmt->close();
$_SESSION['id']=$id;
$_SESSION['login']=$email;
$uip=$_SERVER['REMOTE_ADDR'];
$ldate=date('d/m/Y h:i:s', time());
if($rs)
{
$uid=$_SESSION['id'];
$uemail=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
$mysqli->query($log);
if($log)
{
header("location:user/dashboard.php");
}
}
else
{
echo "<script>alert('Invalid Username/Email or password');</script>";
}
}
?>

