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
                      <li><a href="hostels.php">Hostels</a></li>
<li><a href="add_a_new_hostel.php">Add a Hostel</a></li>
                      <li class="active"><a href="rooms.php">Rooms</a></li>
                 <li><a href="Hostel">Log In</a></li>
                      <li><a href="Hostel/signup.php">Sign Up</a>   </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
    <div class="slide-one-item home-slider owl-carousel">
      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="mb-2">Relaxing Room</h1>
              <h2 class="caption">Your Room, Your Stay</h2>
            </div>
          </div>
        </div>
      </div> 
      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              
              <h1 class="mb-2">Welcome To Our Hostels</h1>
              <h2 class="caption">Hostel &amp; Resort</h2>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="mb-2">Unique Experience</h1>
              <h2 class="caption">Enjoy With Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <h2 class="text-center text-primary" style="padding-top: 40px">Check Room Availability</h2>
    <form method="post" style="padding:20px">
      <div class="form-group">
        <label>Hostel Name</label>
        <select name="hname" class="form-control" required="">
          <option value="">Select Hostel</option>
          <?php
          $con=mysqli_connect("localhost","root","","hostel");
          $sql="SELECT DISTINCT(`hostel_name`) FROM rooms";
          $run=mysqli_query($con,$sql);
          while($data=mysqli_fetch_assoc($run))
          {
            ?>
            <option value="<?php echo $data['hostel_name'];?>"><?php echo $data['hostel_name'];?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Seater</label>
        <select name="seater" class="form-control" required="">
          <option value="">Seater</option>
          <?php
          $con=mysqli_connect("localhost","root","","hostel");
          $sql="SELECT DISTINCT(`seater`) FROM rooms";
          $run=mysqli_query($con,$sql);
          while($data=mysqli_fetch_assoc($run))
          {
            ?>
            <option value="<?php echo $data['seater'];?>"><?php echo $data['seater'];?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <input type="submit" name="submit" value="Check Availability" class="btn btn-primary">
    </form>
<h3 class="text-center text-danger">Please click on <u><a href="Hostel"> signup</a></u>  button to create an account and book a room</h3>
  </div>
  <div class="col-md-2"></div>
</div>
</div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Our Rooms</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a class="d-block mb-0 thumbnail"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><p>Standard Room</p></h3>
                <strong class="price">3000.00 / per Month</strong>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a class="d-block mb-0 thumbnail"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><p>Two Seater Rooms</p></h3>
                <strong class="price">2000.00 / per Month</strong>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a class="d-block mb-0 thumbnail"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><p>Three Seater Rooms</p></h3>
                <strong class="price">1500.00 / per Month</strong>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a class="d-block mb-0 thumbnail"><img src="images/hostel.jpg" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><p>Deluxe Room</p></h3>
                <strong class="price">3000.00 / per Month</strong>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a class="d-block mb-0 thumbnail"><img src="images/hostel3.jpg" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><p>Luxury Room</p></h3>
                <strong class="price">2000.00 / per Month</strong>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a class="d-block mb-0 thumbnail"><img src="images/hostel2.jpg" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><p>4 Seater Room</p></h3>
                <strong class="price">1500.00 / per Month</strong>
              </div>
            </div>
          </div>
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
if(isset($_POST['submit']))
{
  $hostel=$_POST['hname'];
  $seater=$_POST['seater'];
$sql="SELECT * FROM `rooms` WHERE `hostel_name`='$hostel' AND `seater`='$seater' AND `status`='free'";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run)>0)
{
echo '<script>alert("CONGRATULATION ! Room is Free. Please click on signup button to create an account and book a room");</script>';
}
else
{
echo '<script>alert("Room is Not Free ! Choose Other One");</script>';
}
}
?>