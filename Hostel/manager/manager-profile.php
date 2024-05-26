<?php
session_start();
$aid=$_SESSION['id'];
?>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="theme-color" content="#3e454c">
<title>Manager Profile</title>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
<link rel="stylesheet" href="css/bootstrap-social.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link rel="stylesheet" href="css/fileinput.min.css">
<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript">
function valid()
{

if(document.changepwd.newpassword.value!= document.changepwd.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.changepwd.cpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
<?php include('includes/header.php');?>
<div class="ts-main-content">
<?php include('includes/sidebar.php');?>
<div class="content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h2 class="page-title">Manager Profile</h2>
<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">Manager profile details</div>
<div class="panel-body">
<form method="post" class="form-horizontal">

<?php
include("dbcon.php");
$sql="SELECT * FROM `hostel_manager` WHERE `Hostel_man_id`='$aid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
?>

<br>
<div class="form-group">
<label class="col-sm-2 control-label">Username</label>
<div class="col-sm-10">
<input type="text" value="<?php echo $data['Username']; ?>" disabled class="form-control"><span class="help-block m-b-none">
Username can't be changed.</span> </div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" name="email" id="emailid" value="<?php echo $data['email'];?>" required="required">

</div><br><br>
</div>
<div class="col-sm-8 col-sm-offset-2">
<button class="btn btn-default" type="submit">Cancel</button>
<input class="btn btn-primary" type="submit" name="update" value="Update Profile">
</div>
</div>

</form>
<br>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">Change Password</div>
<div class="panel-body">
<form method="post" class="form-horizontal" name="changepwd" id="change-pwd" onSubmit="return valid();">


<br>
<div class="form-group">
<label class="col-sm-4 control-label">old Password </label>
<div class="col-sm-8">
<input type="password" value="" name="old" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
<span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span> </div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label">New Password</label>
<div class="col-sm-8">
<input type="password" class="form-control" name="new" id="newpassword" value="" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label">Confirm Password</label>
<div class="col-sm-8">
<input type="password" class="form-control" value="" required="required" id="cpassword" name="conf" >
</div>
</div>



<div class="col-sm-6 col-sm-offset-4">
	<button class="btn btn-default" type="submit">Cancel</button>
	<input type="submit" name="changepwd" Value="Change Password" class="btn btn-primary">
</div>

</form>

</div>
</div>
</div>
</div>




</div>
</div>

</div>
</div> 	


</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>
</body>

</html>



<?php

if (isset($_POST['update']))
 {
  $mail=$_POST['email'];
  $sql_fetch_email="SELECT * FROM `hostel_manager` WHERE `email`='$mail' AND `Hostel_man_id` NOT IN ('$aid')";
  $run=mysqli_query($con,$sql_fetch_email);
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
  $sql_fetch="UPDATE `hostel_manager` SET `email`='$mail' WHERE `Hostel_man_id`='$aid'";
  $run=mysqli_query($con,$sql_fetch);
  if($run)
  {
    ?>
   <script type="text/javascript">
      alert("Record Updated Successfully !");
    </script>
   <?php
  }
  else
  {
    ?>
   <script type="text/javascript">
      alert("Some Errors Try Again !");
    </script>
   <?php
  }
 }
}
?>

<?php

if (isset($_POST['changepwd']))
 {
  $password = $_POST['old'];
  $new=$_POST['new'];
  $cnf = $_POST['conf'];

  if($new !== $cnf){
      ?>
   <script type="text/javascript">
      alert("Passwords Not Matched !");
     
    </script>
   <?php
    exit();
  }
  else
  {
  $sql_fetch="UPDATE `hostel_manager` SET `Pwd`='$new' WHERE `Hostel_man_id`='$aid'";
  $run=mysqli_query($con,$sql_fetch);
  if($run)
  {
    ?>
   <script type="text/javascript">
      alert("Password Updated Successfully !");
    </script>
   <?php
  }
  else
  {
    ?>
   <script type="text/javascript">
      alert("Some Errors Try Again !");
    </script>
   <?php
  }
 }
}



