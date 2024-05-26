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
    <h1>Hostel Management System</h1>
    <div class=" w3l-login-form">
        <h2>Re-set Password</h2>
        <form method="POST">

            <div class=" w3l-form-group">
                <label>Customer E-Mail:</label>
                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" class="form-control" name="email" placeholder="E-Mail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="E-Mail is not in correct Format"/>
                </div>
            </div>
        <button type="submit" name="submit">Reset Now</button>
        </form>
          <p class=" w3l-register-p">Login as<a href="../login-hostel_manager.php" class="register"> Hostel-Manager/Admin</a></p>
        <p class=" w3l-register-p">Don't have an account?<a href="../signup.php" class="register"> Sign up</a></p>
             <p class=" w3l-register-p">Login as<a href="../index.php" class="register"> Customer</a></p>
   
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2020 Hostel Management System. All Rights Reserved</p>
    </footer>

</body>

</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../includes/config.inc.php';
if(isset($_POST["submit"]) && (!empty($_POST["email"])))
{
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if(!$email) 
{
  ?>
  <script type="text/javascript">
    alert("Invalid email address please type a valid email address!");
  </script>
  <?php
}
else
{
$sel_query = "SELECT * FROM `userregistration` WHERE `email`='$email'";
$results = mysqli_query($conn,$sel_query) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);;
$row = mysqli_num_rows($results);
if ($row=="")
{
  ?>
  <script type="text/javascript">
    alert("This E-Mail is Not Exist in out Database !")
  </script>
  <?php
}
else
{
  $data=mysqli_fetch_assoc($results);
  $cnic=$data['cnic'];
  $pass=$data['password'];
  $output='<p>Dear user,</p>';
$output.='<p>Please click on the below button to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://localhost/HMS/Hostel/Reset_Password/reset-password.php?cnic='.$cnic.'&email='.$email.'&pass='.$pass.'&action=reset" target="_blank">Click Here to Reset Password</a></p>'; 
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. </p>';   
$output.='<p>Thanks,</p>';
echo $output;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'cibop.pk@gmail.com';                     
    $mail->Password   = '9Xwt3ve0';                               
    $mail->SMTPSecure = 'ssl';                    
    $mail->Port       = 465;                                    
    $mail->setFrom($email, 'Hostel Management System');
    $mail->addAddress($email); 
    $mail->addReplyTo('cibop.pk@gmail.com','Reply');
    $mail->isHTML(true);                                 
    $mail->Subject = "Password Reset";
    $mail->Body    =$output;
    $mail->send();
    ?>
    <script type="text/javascript">
      alert("Please Check Your E-Mail to Reset Password !");
    </script>
    <?php
} 
catch (Exception $e) 
{
    ?>
    <script type="text/javascript">
      alert("Message could not be sent. Try Again");
    </script>
    <?php
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}
}
?>