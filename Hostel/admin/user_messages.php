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
<br><br><br>
<h1 style="text-align: center;font-weight: bold;padding-top: 20px;">Total Messages</h1>
            <p style="text-align: center;font-weight: bold;">Please Check your inbox to reply to users</p>
            <br>
      
    <table class="table table-responsive table-condensed">
        <thead>
        <tr>
          <td style="font-size: 19px;text-align: center;">ID</td>
          <td style="font-size: 19px;text-align: center;">Name</td>
          <td style="font-size: 19px;text-align: center;">E-Mail</td>
          <td style="font-size: 19px;text-align: center;">Message</td>
          <td style="font-size: 19px;text-align: center;">Message Date</td>
        </tr>
        </thead>
        <tbody>
          <?php
          $con=mysqli_connect("localhost","root","","hostel");
          $sql="SELECT * FROM `contact_us`";
          $run=mysqli_query($con,$sql);
          if(mysqli_num_rows($run)>0)
          {
          while($data=mysqli_fetch_assoc($run))
          {
              ?>
              <tr>
                  <td class="text-center"><?php echo $data['id'];?></td>
                  <td class="text-center"><?php echo $data['username'];?></td>
                  <td class="text-center"><?php echo $data['email'];?></td>
                  <td class="text-center"><?php echo $data['message'];?></td>
                  <td class="text-center"><?php echo $data['message_date'];?></td>                                       
              <?php
          }
        }
     else
      {
        ?>
        <h2 style="color: white;text-align: center;">No Record Found</h2>
        <?php
      }
        ?>
     </tbody>
      </table>

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