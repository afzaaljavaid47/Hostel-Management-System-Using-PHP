<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMS</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
    <h1>Hostel Room Allocation System</h1>
    <div class=" w3l-login-form">
        <h2>Hostel-Manager/Admin Login</h2>
        <form method="POST">

            <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="required" minlength="3" title="UserName should not be less than 3 characters (i.e. Ali etc.)" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required"  minlength="8" title="Password Must be 8 Digit Long"/>
                </div>
            </div>
            <!--<div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>-->
            <button type="submit" name="login-submit">Login</button>
        </form>
          <p class=" w3l-register-p">Login as<a href="index.php" class="register"> Customer</a></p>
      <!--  <p class=" w3l-register-p">Don't have an account?<a href="signup.php" class="register"> Sign up</a></p>-->
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2018 DBMS Project. All Rights Reserved | Design by <a href="https://www.linkedin.com/in/bharat-reddy/">Bharat-Prajwal-Rakesh</a></p>
    </footer>

</body>

</html>

<?php

if (isset($_POST['login-submit'])) {

  require 'includes/config.inc.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) 
  {
    header("Location: ../login-hostel_manager.php?error=emptyfields");
    exit();
  }
  else 
  {
    $sql = "SELECT * FROM `hostel_manager` WHERE `Username`='$username' AND `Pwd`='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result); 
        session_start();  
        $_SESSION['isadmin'] = $row['Isadmin'];
        $_SESSION['id']=$row['Hostel_man_id'];
        if($_SESSION['isadmin']==0){
          header("Location: manager/manager-profile.php");
        }
        else {
          header("Location: admin/admin-profile.php");
        }
  
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
  }

