<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIGNUP PAGE</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="jquery-simple-validator.min.js"></script>
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
        <h2>Sign Up Here</h2>
        <form validate="true" method="POST">

            <div class=" w3l-form-group">
                <label>Customer CNIC </label>
                <div class="group">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" class="form-control" name="cnic" placeholder="CNIC No." required="required" minlength="13" title="CNIC Number sholud be 13 characters long (3460298503051) and accept only numbers" minlength="13" maxlength="13" pattern="[0-9]+$"/>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>First Name</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required="required" minlength="3" title="UserName should not be less than 3 characters (i.e. Ali etc.)" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Middle Name</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="mname" placeholder="Middle Name"/>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Last Name</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required="required" minlength="3" title="UserName should not be less than 3 characters (i.e. Ali etc.)"  />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Gender</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <select name="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Female">Others</option>
                    </select>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Mobile No</label>
                <div class="group">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile No" required="required" minlength="11" title="Phone Number should not be less than 11 numbers (i.e. Ali 0323455766)" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" class="form-control" name="mail" placeholder="Email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="E-Mail is not in correct Format" />
                </div>
            </div>

            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password" required="required" minlength="8" title="Password Must be 8 Digit Long"/>
                </div>
            </div>

            <div class=" w3l-form-group">
                <label>Confirm Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" id="exampleConfirmPassword1" class="form-control" name="confirmpwd" placeholder="Confirm Password" required="required" data-match="password"
              data-match-field="#exampleInputPassword1"minlength="8" title="Password Must be 8 Digit Long" />
                </div>
            </div>
        <button type="submit" name="signup-submit">Sign Up</button>
        </form>
        <p class=" w3l-register-p">Already a member?<a href="index.php" class="register"> Login</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2020 Hostel Management System. All Rights Reserved</p>
    </footer>

</body>

</html>
<?php

if (isset($_POST['signup-submit'])) {

  require 'includes/config.inc.php';

  $cnic = $_POST['cnic'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $gender=$_POST['gender'];
  $mobile = $_POST['mobile'];
  $password = $_POST['pwd'];
  $mail=$_POST['mail'];
  $cnfpassword = $_POST['confirmpwd'];



  $sql_fetch_cnic="SELECT * FROM `userregistration` WHERE `cnic`='$cnic' ";
  $run=mysqli_query($conn,$sql_fetch_cnic);
  if(mysqli_num_rows($run)>0)
  {
    ?>
   <script type="text/javascript">
      alert("CNIC Number Already Exists !");
     
    </script>
   <?php
   exit();
  }
  $sql_fetch_cnic="SELECT * FROM `userregistration` WHERE `email`='$mail' ";
  $run=mysqli_query($conn,$sql_fetch_cnic);
  if(mysqli_num_rows($run)>0)
  {
    ?>
   <script type="text/javascript">
      alert("E-Mail Already Exists ! Try With Other E-Mail Account");
    </script>
   <?php
   exit();
  }
  else
  {
  $date=date('Y-m-d h:i:sa');
  $sql="INSERT INTO `userregistration`(`cnic`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`) VALUES('$cnic','$fname','$mname','$lname','$gender','$mobile','$mail','$password','$date')";
  $run=mysqli_query($conn,$sql);
  if($run)
  {
    ?>
    <script type="text/javascript">
      alert("Sign Up Successfully !");
    </script>

    <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
      alert("Some Errors Try Agian ! ");
    </script>
    <?php   
  }
  }  
}
?>

