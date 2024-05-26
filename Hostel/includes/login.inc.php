<?php

if (isset($_POST['login-submit']))
{

  require 'config.inc.php';

  $roll = $_POST['student_roll_no'];
  $password = md5($_POST['pwd']);

  if (empty($roll) || empty($password)) 
  {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else 
  {
    $sql = "SELECT * FROM `student` WHERE `Student_id`='$roll' AND `Pwd`='$password'";
    $result = mysqli_query($conn, $sql);
    if($result == true) 
      {session_start();
        $_SESSION['roll'] = $row['Student_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['department'] = $row['Dept'];
        $_SESSION['year_of_study'] = $row['Year_of_study'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['room_id'] = $row['Room_id'];
        if(isset($_SESSION['department']))
        {
          echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else 
        {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        //echo $_SESSION['lname'];
        header("Location: ../home.php?login=success");
        //exit();
      }
      else 
      {
        header("Location: ../index.php?error=strangeerr");
        exit();
      }
    }
  }
