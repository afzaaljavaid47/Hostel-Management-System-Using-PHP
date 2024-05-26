<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
$con=mysqli_connect("localhost","root","","hostel");
$id=$_GET['id'];
check_login();
//code for add courses
if(isset($_POST['submit']))
{
    $uname=$_POST['uname'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mail=$_POST['email'];
	$pass=$_POST['password'];
	$mob=$_POST['mobile'];
$query="UPDATE `hostel_manager` SET `Username`='$uname',`Fname`='$fname',`Lname`='$lname',`Mob_no`='$mob',`email`='$mail',`Pwd`='$pass' WHERE `Hostel_man_id`='$id'";
mysqli_query($con,$query);
echo"<script>alert('Manager Info has been Updated successfully');</script>";
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
<title>Edit Manager Info</title>
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

<h2 class="page-title">Edit Manager</h2>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Edit Manager</div>
<div class="panel-body">
<form method="post" class="form-horizontal">
<?php

$sql="SELECT * FROM `hostel_manager` WHERE `Hostel_man_id`='$id'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
$hid=$data['Hostel_id'];
$sql="SELECT * FROM `hostel` WHERE `Hostel_id`='$hid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
$hnam=$data['Hostel_name'];

?>
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name </label>
<div class="col-sm-8">
<input type="text" name="hname" class="form-control" readonly="" value="<?php echo $hnam;?>">

</div>
</div>
<?php	
$id=$_GET['id'];
$ret="SELECT * FROM `hostel_manager` WHERE `Hostel_man_id`=? ";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('i',$id);
$stmt->execute() ;
$res=$stmt->get_result();
while($row=$res->fetch_object())
{
?>
<div class="form-group">
<label class="col-sm-2 control-label">First Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="fname" id="cns" value="<?php echo $row->Fname;?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Last Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="lname" id="cns" value="<?php echo $row->Lname;?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Username</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="uname" id="cns" value="<?php echo $row->Username;?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Mobile No.</label>
<div class="col-sm-8">

<input type="text" class="form-control" name="mobile" id="cns" value="<?php echo $row->Mob_no;?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">E-Mail</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="email" value="<?php echo $row->email;?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="password" value="<?php echo $row->Pwd;?>">
</div>
</div>
<?php 
} 
?>
<div class="col-sm-8 col-sm-offset-2">

<input class="btn btn-primary" type="submit" name="submit" value="Update Manager Info">
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