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
<li class="active"><a href="add_a_new_hostel.php">Add a Hostel</a></li>
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
    
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Fill below form to Add Your Hostel</span>
              <h1 class="mb-4">Add Now</h1>
            </div>
          </div>
        </div>
      </div>  

    
    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form method="post" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Hostel Honor Name</label>
                  <input type="text" id="fullname" name="hhname" class="form-control" placeholder="Hostel Honor Name" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Honor E-Mail</label>
                  <input type="email" id="fullname" name="email" class="form-control" placeholder="Hostel Honor E-Mail" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Mobile No.</label>
                  <input type="text" id="fullname" name="mno" class="form-control" placeholder="Hostel Honor Mobile No." required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Hostel Name</label>
                  <input type="text" id="fullname" name="hname" class="form-control" placeholder="Hostel Name" required="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Hostel Type</label>
                  <select name="type" class="form-control" required="">
      <option value="">Choose Hostel Type</option>
      <option value="girls">Girls</option>
      <option value="boys">Boys</option>
    </select>
                 
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Hostel Strength(No. of Rooms)</label>
                  <input type="number" id="fullname" name="strength" class="form-control" required="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Hostel Address</label> 
                  <textarea name="address" id="message" cols="30" rows="5" class="form-control" placeholder="Hostel Address Here.." required=""></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit_hostel" value="Add a Hostel" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>

  <h2 class="text-secondary">"After the approval of admin, your hostel will be shown on website"</h2>
            </form>

          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">Enter Your Address Here</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+92 300 1234567</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="mailto:waqarahmedkhan29@gmail.com">waqarahmedkhan29@gmail.com</a></p>

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
modation of the customers studying in this institution. And hence there is a lot of strain on the person
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
if(isset($_POST['submit_hostel']))
{
$hhname=$_POST['hhname'];
$emai=$_POST['email'];
$mno=$_POST['mno'];  
$hname=$_POST['hname'];
$type=$_POST['type'];
$strength=$_POST['strength'];
$address=$_POST['address'];
$sql="INSERT INTO `hostel`(`Honor_name`, `Honor_email`, `Honor_mobile`, `Hostel_name`, `No_of_rooms`, `address`, `type`) VALUES ('$hhname','$emai','$mno','$hname','$strength','$address','$type')";
$run=mysqli_query($con,$sql);
if($run)
{
  ?>
  <script type="text/javascript">
    alert("Record Submitted Successfully !");
  </script>
  <?php
}
else
{
 ?>
  <script type="text/javascript">
    alert("Record Not Submitted Successfully !");
  </script> 
  <?php
}
}

?>