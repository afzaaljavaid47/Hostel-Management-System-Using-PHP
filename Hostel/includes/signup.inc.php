<?php

if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['student_roll_no'];
  $fname = $_POST['student_fname'];
  $lname = $_POST['student_lname'];
  $mobile = $_POST['mobile_no'];
  $dept = $_POST['department'];
  $year = $_POST['year_of_study'];
  $password = $_POST['pwd'];
  $mail=$_POST['mail'];
  $cnfpassword = $_POST['confirmpwd'];


  if(!preg_match("/^[a-zA-Z0-9]*$/",$roll)){
    header("Location: ../signup.php?error=invalidroll");
    exit();
  }
  else if($password !== $cnfpassword){
    header("Location: ../signup.php?error=passwordcheck");
    exit();
  }
  else 
  {
  $sql_fetch_cnic="SELECT * FROM `student` WHERE `Student_id`='$roll' ";
  $run=mysqli_query($conn,$sql_fetch_cnic);
  if(mysqli_num_rows($run)>0)
  {
    ?>
   <script type="text/javascript">
      alert("Roll Number Already Exists !");
     
    </script>
   <?php
    header("Location: ../signup.php");
   exit();
  }
  $sql_fetch_cnic="SELECT * FROM `student` WHERE `email`='$mail' ";
  $run=mysqli_query($conn,$sql_fetch_cnic);
  if(mysqli_num_rows($run)>0)
  {
    ?>
   <script type="text/javascript">
      alert("E-Mail Already Exists ! Try With Other E-Mail Account");
    </script>
   <?php
    header("Location: ../signup.php");
   exit();
  }
  else
  {
  $sql="INSERT INTO `student`(`Student_id`, `Fname`, `Lname`, `Mob_no`, `Dept`, `Year_of_study`, `Pwd`, `email`) VALUES ('$roll','$fname','$lname','$mobile','$dept','$year','$password','$mail')";
  $run=mysqli_query($conn,$sql);
  if($run)
  {
    ?>
    <script type="text/javascript">
      alert("Sign Up Successfully !");
      header('signup.php');
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
    header("Location: ../signup.php");
  }
  }  
}
}

