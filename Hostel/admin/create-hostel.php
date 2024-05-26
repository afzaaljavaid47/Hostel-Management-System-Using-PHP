<?php
session_start();
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
	
	<title>DashBoard</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
<?php include('includes/header.php');?>
<div class="ts-main-content">
<?php include('includes/sidebar.php');?>
<div class="content-wrapper">
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<br><br>
<h2 class="page-title">Add a New Hostel </h2>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Add a Hostel</div>
<div class="panel-body">
<form method="post" class="form-horizontal">
	
	<div class="hr-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Hostel Name</label>
		<div class="col-sm-8">
		<input type="text" name="name" class="form-control" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Number of Rooms</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="no" id="rmno" value="" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Type</label>
<div class="col-sm-8">
<select name="type" class="form-control" required="">
	<option value="">Choose Hostel Type</option>
<option value="boys">Boys</option>
	<option value="girls">Girls</option>
</select>

</div>
</div>
<div class="form-group">
		<label class="col-sm-2 control-label">Hostel Address</label>
		<div class="col-sm-8">
		<textarea name="address" class="form-control" required=""></textarea>
</div>
</div>
<div class="col-sm-8 col-sm-offset-2">
<input class="btn btn-primary" type="submit" name="submit" value="Create Hostel">
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

if (isset($_POST['submit'])) {

  require 'dbcon.php';

  $name=$_POST['name'];
  $address=$_POST['address'];
  $no=$_POST['no'];
  $type=$_POST['type'];
  $sql="INSERT INTO `hostel`(`Hostel_name`, `No_of_rooms`, `address`, `type`) VALUES ('$name','$no','$address','$type')";
  $run=mysqli_query($con,$sql);
  if($run)
  {
    ?>
    <script type="text/javascript">
      alert("Hostel Created Successfully !");
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

