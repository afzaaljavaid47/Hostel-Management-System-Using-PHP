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
<h2 class="page-title" style="padding-top:2%">Booked Room Details</h2>
<div class="panel panel-default">
<div class="panel-heading">Your Room Details</div>
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
<td colspan="9"><h4>Room Realted Info</h4></td>
</tr>
<tr>
<td><b>Hostel Name : </b></td>
<td colspan="2"><?php echo $row['hostel_name'];?></td>
<td colspan="2"><b>Registration Date & Time : </b></td>
<td><?php echo $row['postingDate'];?></td>
</tr>



<tr>
<td><b>Room no :</b></td>
<td><?php echo $row['roomno'];?></td>
<td><b>Seater :</b></td>
<td><?php echo $row['seater'];?></td>
<td><b>Fees PM</b></td>
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
;?></td>
<td colspan="1"><b>Stay From :</b></td>
<td><?php echo $row['stayfrom'];?></td>
<td><b>Duration:</b></td>
<td><?php echo $dr=$row['duration'];?> Months</td>
</tr>

<tr>
<td colspan="6"><b>Total Fee : 
<?php if($row['foodstatus']==1)
{ 
$fd=2000; 
echo (($dr*$fpm)+$fd);
}
else
{
echo $dr*$fpm;
}
?></b></td>
</tr>
<tr>
<td colspan="6"><h4>Personal Info</h4></td>
</tr>

<tr>
<td><b>CNIC No. :</b></td>
<td><?php echo $row['cnic'];?></td>
<td><b>Full Name :</b></td>
<td><?php echo $row['firstName'];?><?php echo $row['middleName'];?><?php echo $row['lastName'];?></td>
<td><b>Email :</b></td>
<td><?php echo $row['emailid'];?></td>
</tr>


<tr>
<td colspan="2"><b>Contact No. :</b></td>
<td><?php echo $row['contactno'];?></td>
<td colspan="2"><b>Gender :</b></td>
<td><?php echo $row['gender'];?></td>
</tr>


<tr>
<td><b>Emergency Contact No. :</b></td>
<td><?php echo $row['egycontactno'];?></td>
<td><b>Guardian Name :</b></td>
<td><?php echo $row['guardianName'];?></td>
<td><b>Guardian Relation :</b></td>
<td><?php echo $row['guardianRelation'];?></td>
</tr>

<tr>
<td><b>Guardian Contact No. :</b></td>
<td colspan="6"><?php echo $row['guardianContactno'];?></td>
</tr>

<tr>
<td colspan="6"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Correspondense Address</b></td>
<td colspan="2">
<?php echo $row['corresAddress'];?><br />
<?php echo $row['corresCIty'];?>, <?php echo $row['corresPincode'];?><br />
<?php echo $row['corresState'];?>


</td>
<td><b>Permanent Address</b></td>
<td colspan="2">
<?php echo $row['pmntAddress'];?><br />
<?php echo $row['pmntCity'];?>, <?php echo $row['pmntPincode'];?><br />
<?php echo $row['pmnatetState'];?>	

</td>
</tr>
<tr style="text-align: center;"><td colspan="9"><a href="javascript:void(0);" style="letter-spacing: 2px;font-size: 19px" class="btn btn-primary" style="text-align: center;" onClick="popUpWindow('http://localhost/HMS/Hostel/user/full-profile.php?id=<?php echo $row['emailid'];?>');" title="View Full Details">Print Data</a></td>
</tr>

<?php
$cnt=$cnt+1;
} 
}
else
{
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
