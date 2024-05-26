



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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="../jquery-simple-validator.min.js"></script>
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>

<?php
include('../includes/config.inc.php');
if (isset($_GET["cnic"]) && isset($_GET["email"]) && isset($_GET["action"]) && isset($_GET["pass"])&&($_GET["action"]=="reset") && !isset($_POST["action"]))
{
  $cnic = $_GET["cnic"];
  $email = $_GET["email"];
  $pass = $_GET["pass"];
  $query = mysqli_query($conn,"SELECT * FROM `userregistration` WHERE `cnic`='$cnic' AND `email`='$email' AND `password`='$pass'");
  $row = mysqli_num_rows($query);
  if ($row==0)
  {
  echo '<script>alert("The link is invalid expired. Either you did not copy the correct link from the email, or you have already used the key in which case it is deactivated")</script>';
  }
  else
  {
    ?>
 <h1>Hostel Management System</h1>
    <div class=" w3l-login-form">
        <h2>Re-set Password</h2>
        <form validate="true" method="POST">

            <div class=" w3l-form-group">
                <label>New Password </label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control"  id="exampleInputPassword1" name="pass1" placeholder="Password" required="required" minlength="8" title="Password Must be 8 Digit Long"/>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Confirm Password</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" id="exampleConfirmPassword1" name="pass2" placeholder="Confirm Password" required="required" data-match="password"
              data-match-field="#exampleInputPassword1"minlength="8" title="Password Must be 8 Digit Long"/>
                </div>
            </div>
        <button type="submit" name="submit">Reset Now</button>
        </form>
          <p class=" w3l-register-p">Login as<a href="../login-hostel_manager.php" class="register"> Hostel-Manager/Admin</a></p>
        <p class=" w3l-register-p">Don't have an account?<a href="../signup.php" class="register"> Sign up</a></p>
             <p class=" w3l-register-p">Login as<a href="../index.php" class="register"> Student</a></p>
   
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2020 Hostel Management System. All Rights Reserved</p>
    </footer>

</body>

    
    <?php
  }
}
?>










<?php
if(isset($_POST["submit"]))
{
$pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
if ($pass1!=$pass2)
{
$error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
}
$pass1 = $pass1;
mysqli_query($conn,"UPDATE `userregistration` SET `password`='$pass1' WHERE `cnic`='$cnic' AND `password`='$pass' AND `email`='$email'");
 

 
echo '<script>alert("Congratulations! Your password has been updated successfully.");</script>';
  } 
?>