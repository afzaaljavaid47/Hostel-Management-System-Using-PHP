<?php
session_start();
include('dbcon.php');
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
<title>Edit Hostel</title>
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

<h2 class="page-title">Edit Hostel</h2>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Edit Hostel</div>
<div class="panel-body">
<form method="post" class="form-horizontal">
<?php	
$id=$_GET['id'];
$sql="SELECT * FROM `hostel` WHERE `Hostel_id`='$id'";
$run=mysqli_query($con,$sql);	
$row=mysqli_fetch_assoc($run);
?>
<div class="hr-dashed"></div>

<div class="form-group">
<label class="col-sm-2 control-label">Honor Name </label>
<div class="col-sm-8">
<input type="text" name="hhname" value="<?php echo $row['Honor_name'];?>" class="form-control"> </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Honor E-Mail </label>
<div class="col-sm-8">
<input type="email" name="email" value="<?php echo $row['Honor_email'];?>" class="form-control"> </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Honor Mobile No. </label>
<div class="col-sm-8">
<input type="text" name="mno" value="<?php echo $row['Honor_mobile'];?>" class="form-control"> </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name </label>
<div class="col-sm-8">
<input type="text" name="hname" value="<?php echo $row['Hostel_name'];?>" class="form-control"> </div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">No of Rooms</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="hno" id="cns" value="<?php echo $row['No_of_rooms'];?>" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">No of Rooms</label>
<div class="col-sm-8">
	<select name="type" class="form-control" required="">
	<option value="<?php echo $row['type'];?>"><?php echo $row['type'];?></option>
    <option value="boys">Boys</option>
	<option value="girls">Girls</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Hostel Address</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="hadd" value="<?php echo $row['address'];?>" >
</div>
</div>
<div class="col-sm-8 col-sm-offset-2">

<input class="btn btn-primary" type="submit" name="submita" value="Update Hostel">
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

<?php

if(isset($_POST['submita']))
{
$hhname=$_POST['hhname'];
$email=$_POST['email'];
$mno=$_POST['mno'];
$name=$_POST['hname'];
$no=$_POST['hno'];
$address=$_POST['hadd'];
$type=$_POST['type'];
$query="UPDATE `hostel` SET `Honor_name`='$hhname',`Honor_email`='$email',`Honor_mobile`='$mno',`Hostel_name`='$name',`No_of_rooms`='$no',`address`='$address',`type`='$type' WHERE `Hostel_id`='$id'";
$run=mysqli_query($con,$query);
if($run)
{
	?>
	<script type="text/javascript">
		alert("Record Updated Successfully !")
	</script>
	<?php
}
else
{
	?>
	<script type="text/javascript">
		alert("Some Errors Try Again !")
	</script>
	<?php
}
}
?>