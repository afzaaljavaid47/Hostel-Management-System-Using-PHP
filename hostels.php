<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hostel Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-1">
                <h2 class="mb-0 site-logo"><a href="index.php">HMS</a></h2>
              </div>
              <div class="col-11">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    
                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li>
                        <a href="index.php">Home</a>
                      </li>
                      <li><a href="about.php">About Us</a></li>
                      <li><a href="services.php">Services</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                      <li class="active"><a href="hostels.php">Hostels</a></li>
                      <li><a href="add_a_new_hostel.php">Add a Hostel</a></li>
                      <li><a href="rooms.php">Rooms</a></li>
                <li><a href="Hostel">Log In</a></li>
                      <li><a href="Hostel/signup.php">Sign Up</a>    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Welcome to</span>
              <h1 class="mb-4">Our Hostels</h1>
            </div>
          </div>
        </div>
      </div>  
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1_a3dgWGNSsKRzb_1zTM_t_WTFLMh8G1N" width="1347" height="800"></iframe>
    <div class="site-section site-section-sm">
<div class="container">
<h2 class="text-center text-primary" style="font-weight: bold;padding-bottom: 10px;">Search a Hostel</h2>

<div class="text-center" style="padding-bottom: 40px" id="record">
<form method="post" class="form-inline" action="hostels.php#record">
  <label>Hostel Name &nbsp;  </label>
  <input type="text" class="form-control" placeholder="Enter Hostel Name" name="name" required="">
  <button type="submit" style="margin-left: 10px" class="btn btn-primary" name="search">Search</button>
</form>
</div>
<?php
$con=mysqli_connect("localhost","root","","hostel");
if(isset($_POST['search']))
{
  $name=$_POST['name'];
  $sql="SELECT * FROM `hostel` WHERE `Hostel_name` LIKE '%$name%'";
  $run=mysqli_query($con,$sql);
   ?>
    <h3>Searched Hostels Against <span><u><?php echo $name;?></u></span></h3>
    <div class="row">
    <?php
  if(mysqli_num_rows($run)>0)
  {
  while($data=mysqli_fetch_assoc($run))
  {
      $i=rand(1,10);
?>
<div class="col-md-12 col-lg-4 mb-5">
<div class="card">
<div class="card-header"><img src="img/hostel<?php echo $i; ?>.jpg" width="100%" height="270px"></div>
<h3 class="card-body" style="padding-top: 5px;padding-left: 5px;padding-right: 5px;text-align: center;"><?php echo $data['Hostel_name'];?></h3>
<h4 class="text-center text-info">(<?php echo $data['type'];?> Hostel)</h4>
<h4 class="text-danger" style="text-align: center;"><?php echo $data['address'];?></h4>
<div class="card-footer" style="padding-bottom: 20px">
<a href="Hostel/signup.php" onclick="alert('Please create an account first to book a room in this hostel')" class="btn btn-primary btn-block">Book a Room</a>
</div>
</div>

</div>

<?php

  }
  }
  else
  {
    ?>
    <h3 class="text-center text-info" style="margin-left: 120px;padding: 20px">No Record Found</h3>
    <?php
  }
}
?>
</div>
<h2 class="text-center text-primary" style="font-weight: bold;padding: 20px;">Our Total Hostels</h2>

<h2 class="text-secondary" style="font-weight: bold;padding: 20px;">Boys Hostels</h2>


<div class="row">
<?php
$sql="SELECT * FROM `hostel` WHERE `type`='Boys'";
$run=mysqli_query($con,$sql);
while($data=mysqli_fetch_assoc($run))
{
  $i=rand(1,10);
?>
<div class="col-md-12 col-lg-4 mb-5">
<div class="card">
<div class="card-header"><img src="img/hostel<?php echo $i; ?>.jpg" width="100%" height="270px"></div>
<h3 class="card-body" style="padding-top: 5px;padding-left: 5px;padding-right: 5px;text-align: center;"><?php echo $data['Hostel_name'];?></h3>

<h4 class="text-danger" style="text-align: center;"><?php echo $data['address'];?></h4>
<div class="card-footer" style="padding-bottom: 20px">
<a href="Hostel/signup.php" onclick="alert('Please create an account first to book a room in this hostel')" class="btn btn-primary btn-block">Book a Room</a>
</div>
</div>

</div>

<?php
}
?>

        </div>


<h2 class="text-secondary" style="font-weight: bold;padding: 20px;">Girls Hostels</h2>


<div class="row">
<?php
$sql="SELECT * FROM `hostel` WHERE `type`='Girls'";
$run=mysqli_query($con,$sql);
while($data=mysqli_fetch_assoc($run))
{
  $i=rand(1,10);
?>
<div class="col-md-12 col-lg-4 mb-5">
<div class="card">
<div class="card-header"><img src="img/hostel<?php echo $i; ?>.jpg" width="100%" height="270px"></div>
<h3 class="card-body" style="padding-top: 5px;padding-left: 5px;padding-right: 5px;text-align: center;">
  <?php echo $data['Hostel_name'];?>
</h3>
<h4 class="text-danger" style="text-align: center;"><?php echo $data['address'];?></h4>
<div class="card-footer" style="padding-bottom: 20px">
<a href="Hostel/signup.php" onclick="alert('Please create an account first to book a room in this hostel')" class="btn btn-primary btn-block">Book a Room</a>
</div>
</div>

</div>

<?php
}
?>

        </div>






      </div>
    </div>



    
   <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-md-6">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>As the name specifies “HOSTEL MANAGEMENT SYSTEM” is a software developed
for managing various activities in the hostel. For the past few years the number of educational
institutions are increasing rapidly. Thereby the number of hostels are also increasing for the accom
modation of the students studying in this institution. And hence there is a lot of strain on the person
who are running the hostel and software’s are not usually used in this context. This particular
project deals with the problems on managing a hostel and avoids the problems which occur when
carried manually.
</p>
            <p><a href="about.php" class="btn btn-primary pill text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-5">
                <h3 class="footer-heading text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="about.php">About</a></li>
                    <li><a href="servicees.php">Services</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="hostels.php">Hostels</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                  </ul>
              </div>
             
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy; 2020 Hostel Management System
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  
  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>
    

 
  </body>
</html>


<?php
$con=mysqli_connect("localhost","root","","hostel");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']))
{
    $uname=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cibop.pk@gmail.com';                     // SMTP username
    $mail->Password   = '9Xwt3ve0';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('afzaaljavaid47@gmail.com', 'Hostel Management System');
    $mail->addAddress('afzaaljavaid47@gmail.com'); //client email
    $mail->addReplyTo($email, 'Reply');
    $mail->isHTML(true);                                
    $mail->Subject = $uname;
    $mail->Body    = $message;   
    $mail->send();
    ?>
    <script type="text/javascript">
      alert("Message has been sent");
    </script>
    <?php
   
} 
catch (Exception $e) 
{
  ?>
  <script type="text/javascript">
    alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
  </script>
  <?php
  
}
     $date=date("m-d-Y H-i-sa");
    $sql="INSERT INTO `contact_us`(`username`, `email`, `message`, `message_date`) VALUES ('$uname','$email','$message','$date')";
    $run=mysqli_query($con,$sql);
}

?>