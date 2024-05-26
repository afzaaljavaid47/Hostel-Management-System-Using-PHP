<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
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
<title>Room Details</title>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-social.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link rel="stylesheet" href="css/fileinput.min.css">
<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
<h2 class="page-title" style="margin-top:5%"><b class="text-primary">Room Total Charges</b></h2>
<div class="panel panel-default">
<div class="panel-heading">Your Room Charges</div>
<div class="panel-body">
<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
<tbody>
<?php	
$aid=$_SESSION['login'];
$sql="SELECT * FROM `registration` WHERE `emailid`='$aid'";
$con=mysqli_connect("localhost","root","","hostel");
$run=mysqli_query($con,$sql);
$cnt=1;
if(mysqli_num_rows($run)>0)
{
while($row=mysqli_fetch_assoc($run))
	  {
	  	?>


<tr>
<td colspan="6"><h4>Room Realted Info</h4></td>

</tr>
<tr>
<td><b>Hostel Name : </b></td>
<td colspan="3"><?php echo $row['hostel_name'];?></td>
<td><b>Registration Date & Time : </b></td>
<td><?php echo $row['postingDate'];?></td>
</tr>



<tr>
<td><b>Room no :</b></td>
<td><?php echo $row['roomno'];?></td>
<td><b>Seater :</b></td>
<td><?php echo $row['seater'];?></td>
<td><b>Fees PM :</b></td>
<td><?php echo $fpm=$row['feespm'];?></td>
</tr>

<tr>
<td><b>Food Status:</b></td>
<td>
<?php if($row['foodstatus']==0)
{
echo "Without Food";
}
else
{
echo "With Food";
}
;?>

</td>
<td><b>Stay From :</b></td>
<td><?php echo $row['stayfrom'];?></td>
<td><b>Duration:</b></td>
<td><?php echo $dr=$row['duration'];?> Months</td>
</tr>

<tr>
<td style="text-align: center;"><b class="text-danger">Total Fee :</b></td>
<td colspan="6"> <b class="text-danger">
<?php if($row['foodstatus']==1)
{ 
$fd=2000; 
$charge=($dr*$fpm)+$fd;
echo $charge;
}
else
{
	$charge=$dr*$fpm;
echo $charge;
}
?>
</b>
</td>

</tr>
<tr>
<td colspan="9" style="text-align: center;"><a href="javascript:void(0);" class="btn btn-primary" style="text-align: center;letter-spacing: 2px;font-size: 17px" onClick="popUpWindow('http://localhost/hms/hostel/user/Student_Bill.php?id=<?php echo $row['emailid'];?>');" title="View Full Details">Print Bill</a></td>
</tr>

<?php
$cnt=$cnt+1;
}
}
else
{
	$charge=0;
	?>
   <tr>
   	<td colspan="9">Please Book a Room First to Get info of your booked Room.<a href="hostels.php">Book a Room</a></td>
   </tr>
	<?php
	echo '<script>alert("Please Book a Room First to Get info of your booked Room.")</script>';
}
 ?>
</tbody>
</table>
</div>
</div>


<div class="row">
<h2 class="text-primary" style="padding-left: 15px;"><b>Pay Bill Now</h2>

<div class="col-md-7">
	<img src="img/pay_online.png" width="100%" height="500px"><br><br>
</div>
<div class="col-md-5">
	
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pay Via JazzCash</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pay Via EasyPaisa</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="margin: 0px;">
  	<h3><b class="text-primary">You Can Now Pay Bill Via <i>"EasyPaisa"</i></b></h3><br>
	<div style="text-align: center;">
		<img src="img/Easy.png" width="100%" height="150px"></div>
  	<form method="post">
		<div class="form-group">
			<label>Your Total Hostel Bill </label>
			<input type="" name="" class="form-control" value="<?php echo $charge;?>" readonly="">
		</div>
		<div class="form-group">
			<label>Mobile Number (Your EasyPaisa) </label>
			<input type="" name="" class="form-control" placeholder="Your EasyPaisa Mobile Number Here" required="">
		</div>
		<div class="form-group">
			<label>Your Account Pin Code</label>
			<input type="" name="" class="form-control" placeholder="Your EasyPaisa Account Pin Code Here" required="">
		</div>
		<input type="submit" name="" class="btn btn-primary" value="Pay Bill Now" style="letter-spacing: 2px;font-size: 19px;float: right;">
	</form><br><br></div>
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<h3><b class="text-primary">You Can Now Pay Bill Via <i>"JazzCash"</i></b></h3><br>
	<div style="text-align: center;">
		<img src="img/jazz.png" width="100%" height="150px">
	</div>
	<br>
  	<form method="post">
		<div class="form-group">
			<label>Your Total Hostel Bill </label>
			<input type="" name="" class="form-control" value="<?php echo $charge;?>" readonly="">
		</div>
		<div class="form-group">
			<label>Mobile Number (Your JazzCash) </label>
			<input type="" name="" class="form-control" placeholder="Your JazzCash Mobile Number Here" required="">
		</div>
		<div class="form-group">
			<label>Your Account Pin Code</label>
			<input type="" name="" class="form-control" placeholder="Your JazzCash Account Pin Code Here" required="">
		</div>
		<input type="submit" name="" class="btn btn-primary" value="Pay Bill Now" style="letter-spacing: 2px;font-size: 19px;float: right;">
	</form>
</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><form method="post">
		<div class="form-group">
			<label>Your Total Hostel Bill </label>
			<input type="" name="" class="form-control" value="<?php echo $charge;?>" readonly="">
		</div>
		<div class="form-group">
			<label>Mobile Number (Your EasyPaisa) </label>
			<input type="" name="" class="form-control" placeholder="Your EasyPaisa Mobile Number Here" required="">
		</div>
		<div class="form-group">
			<label>Your Account Pin Code</label>
			<input type="" name="" class="form-control" placeholder="Your EasyPaisa Account Pin Code Here" required="">
		</div>
		<input type="submit" name="" class="btn btn-primary" value="Pay Bill Now" style="letter-spacing: 2px;font-size: 19px;float: right;">
	</form></div>
</div>
</div>



</div>



</div>
</div>
</div>
</div>
</div>

<!-- Loading Scripts -->
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
