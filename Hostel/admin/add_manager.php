<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
$con=mysqli_connect("localhost","root","","hostel");
if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mail=$_POST['email'];
	$pass=$_POST['password'];
	$mob=$_POST['mobile'];
	$hid=$_POST['hname'];
$query="INSERT INTO `hostel_manager`(`Username`, `Fname`, `Lname`, `Mob_no`, `email`, `Hostel_id`, `Pwd`) VALUES ('$uname','$fname','$lname','$mob','$mail','$hid','$pass')";
$run=mysqli_query($con,$query);
echo"<script>alert('Manager has been added successfully');</script>";
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="theme-color" content="#3e454c">
<title>Add Manager</title>
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
</head>
<body>
<?php include('includes/header.php');?>
<div class="ts-main-content">
<?php include('includes/sidebar.php');?>
<div class="content-wrapper">
<div class="container-fluid">

<div class="row">
<div class="col-md-12">

<h2 class="page-title">Add a New Manager</h2>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Add a Manager</div>
<div class="panel-body">
<form method="post" class="form-horizontal">

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name </label>
<div class="col-sm-8">
<select name="hname" required="" class="form-control">
<option value="">Choose Hostel</option>
<?php
$sql="SELECT * FROM `hostel`";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run)>0)
{
	while($data=mysqli_fetch_assoc($run))
{
	?>
	<option value="<?php echo $data['Hostel_id'];?>"><?php echo $data['Hostel_name'];?></option>
	<?php
}
}
else
{
	echo '<script>alert("No any Hostel is there. Please Enter a New Hostel First")</script>';
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">First Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="fname" id="cns" value="" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Last Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="lname" id="cns" value="" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Username</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="uname" id="cns" value="" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Mobile No.</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="mobile" id="cns" value="" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">E-Mail</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="email" value="" required="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password</label>
<div class="col-sm-8">
<input type="password" class="form-control" name="password" value="" required="">
</div>
</div>

<div class="col-sm-8 col-sm-offset-2">

<input class="btn btn-primary" type="submit" name="submit" value="Add Manager">
</div>
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>

</script>
</body>

</html>