<?php
session_start();
$aid=$_SESSION['id'];
$con=mysqli_connect("localhost","root","","hostel");

$sql="SELECT * FROM `hostel_manager` WHERE `Hostel_man_id`='$aid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
$hid=$data['Hostel_id'];

$sql="SELECT * FROM `hostel` WHERE `Hostel_id`='$hid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
$hname=$data['Hostel_name'];

$sql="SELECT * FROM `registration` WHERE `hostel_name`='$hname'";
$run=mysqli_query($con,$sql);
$data=mysqli_num_rows($run);
$no_of_students=$data;

$sql="SELECT * FROM `rooms` WHERE `hostel_name`='$hname'";
$run=mysqli_query($con,$sql);
$data=mysqli_num_rows($run);
$no_of_rooms=$data;

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

<title>Hostels</title>
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
<?php include("includes/header.php");?>

<div class="ts-main-content">
<?php include("includes/sidebar.php");?>
<div class="content-wrapper">
<div class="container-fluid">

<div class="row">
<div class="col-md-12">

<h2 class="page-title text-primary" style="margin-top:5%" >Available Hostels</h2>
<h3 class="text-danger" style="padding-bottom: 20px">Since You are the Manager of <b>"<u><?php echo $hname;?></u>"</b> So you can not have any access to modify other hostels.</h3>
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1_a3dgWGNSsKRzb_1zTM_t_WTFLMh8G1N" width="1070" height="500"></iframe>

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

<script>

window.onload = function(){

// Line chart from swirlData for dashReport
var ctx = document.getElementById("dashReport").getContext("2d");
window.myLine = new Chart(ctx).Line(swirlData, {
responsive: true,
scaleShowVerticalLines: false,
scaleBeginAtZero : true,
multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
}); 

// Pie Chart from doughutData
var doctx = document.getElementById("chart-area3").getContext("2d");
window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

// Dougnut Chart from doughnutData
var doctx = document.getElementById("chart-area4").getContext("2d");
window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

}
</script>

</body>

</html>