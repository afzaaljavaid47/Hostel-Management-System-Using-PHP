<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
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
<?php include("includes/header.php");?>

<div class="ts-main-content">
<?php include("includes/sidebar.php");?>
<div class="content-wrapper">
<div class="container-fluid">

<div class="row">

<div class="col-md-12">
<?php
$uid=$_SESSION['login'];
$stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? ");
$stmt->bind_param('s',$uid);
$stmt->execute();
$stmt -> bind_result($email);
$rs=$stmt->fetch();
$stmt->close();
if($rs)
{ 
	$mes="Room already booked by you";
?>
<h3 style="color: red;padding-top: 20px;text-align: center;" align="left"><?php echo $mes;?></h3>
<?php }
else{
	$mes="";
echo $mes;
}			
?>
<h2 class="page-title text-center" style="margin-top:3%">Available Hostels</h2>

<div class="row">
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1_a3dgWGNSsKRzb_1zTM_t_WTFLMh8G1N" width="1095" height="460"></iframe><br><br>
</div>
</div>
<div class="container-fluid">
<div class="col-md-12">
<?php
$con=mysqli_connect("localhost","root","","hostel");
$sql="SELECT * FROM `hostel`";
$run=mysqli_query($con,$sql);
while($data=mysqli_fetch_assoc($run))
{
	$i=rand(1,10);

?>



<div class="col-md-4">

<div class="card">
<div class="card-header"><img src="img/hostel<?php echo $i; ?>.jpg" width="100%" height="270px"></div>
<h3 class="card-body" style="padding-top: 5px;padding-left: 5px;padding-right: 5px;text-align: center;"><?php echo $data['Hostel_name'];?></h3>
<h4 class="text-center text-info">(<?php echo $data['type'];?> Hostel)</h4>
<h4 class="text-danger" style="text-align: center;"><?php echo $data['address'];?></h4>
<div class="card-footer" style="padding-bottom: 20px">
<a href="book-hostel.php?id=<?php echo $data['Hostel_id']; ?>" class="btn btn-primary btn-block <?php if($mes=="Room already booked by you"){ ?> disabled <?php } ?>">Book a Room</a></div>
</div>
</div>
<?php
}
?>
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