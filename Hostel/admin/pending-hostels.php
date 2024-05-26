<?php
$output="";
session_start();
include('includes/config.php');
include('includes/checklogin.php');
include('dbcon.php');
check_login();

if(isset($_GET['del']))
{
	$id=$_GET['del'];
	$adn="DELETE FROM `hostel` WHERE `Hostel_id`='$id'";
	mysqli_query($con,$adn);
    echo "<script>alert('Data Deleted');</script>" ;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../includes/config.inc.php';

if(isset($_GET['active']))
{
	$id=$_GET['active'];
	$adn="UPDATE `hostel` SET `status`='active' WHERE `Hostel_id`='$id'";
	mysqli_query($con,$adn);
    echo "<script>alert('Hostel Acivated Successfully !');</script>";
$sql="SELECT * FROM `hostel` WHERE `Hostel_id`='$id'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
$hname=$data['Honor_name'];
$mno=$data['Honor_mobile'];
$email=$data['Honor_email'];
$pwd="9Xwt3ve0";

$quer="INSERT INTO `hostel_manager`(`Username`, `Fname`, `Lname`, `Mob_no`, `email`, `Hostel_id`, `Pwd`) VALUES ('$hname','$hname','$hname','$mno','$email','$id','$pwd')";
$run=mysqli_query($con,$quer);
if($run)
{
echo "<script>alert('Manager has been added Successfully');</script>";
}

$output='<p>Dear Client,</p>';
$output.='<p>Congratulation Your Hostel is successfully Added to our Database</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Your UserName Is : '.$hname.'
and password is :'.$pwd.'</p>'; 
$output.='<p>-------------------------------------------------------------</p>';
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'cibop.pk@gmail.com';                     
    $mail->Password   = '9Xwt3ve0';                               
    $mail->SMTPSecure = 'ssl';                    
    $mail->Port       = 465;                                    
    $mail->setFrom($email, 'Hostel Management System');
    $mail->addAddress($email); 
    $mail->addReplyTo('cibop.pk@gmail.com','Reply');
    $mail->isHTML(true);                                 
    $mail->Subject = "Add a New Hostel";
    $mail->Body=$output;
    $mail->send();
    
} 
catch (Exception $e) 
{
    ?>
    <script type="text/javascript">
      alert("Message could not be sent. Try Again");
    </script>
    <?php
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
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
	<title>Manage Hostels</title>
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
						<h2 class="page-title" style="margin-top:4%">Manage Hostels</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Hostels Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Honor Name</th>
											<th>E-Mail</th>
											<th>Mobile</th>
											<th>Hostel Name</th>
											<th>No of Rooms </th>
											<th>Type</th>
											<th>Hostel Address</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Honor Name</th>
											<th>E-Mail</th>
											<th>Mobile</th>
											<th>Hostel Name</th>
											<th>No of Rooms </th>
											<th>Type</th>
											<th>Hostel Address</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="SELECT * FROM `hostel` WHERE `status`='pending'";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>

<td><?php echo $row->Honor_name;?></td>
<td><?php echo $row->Honor_email;?></td>
<td><?php echo $row->Honor_mobile;?></td>

<td><?php echo $row->Hostel_name;?></td>
<td><?php echo $row->No_of_rooms;?></td>
<td><?php echo $row->type;?></td>
<td><?php echo $row->address;?></td>
<td><a href="edit-hostel.php?id=<?php echo $row->Hostel_id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="pending-hostels.php?del=<?php echo $row->Hostel_id;?>" onclick='return confirm("Do you want to delete");'><i class="fa fa-close"></i></a>

<a class="btn btn-primary" href="pending-hostels.php?active=<?php echo $row->Hostel_id;?>" onclick='return confirm("Do you want to Active this Hostel on this Website");'>Active</a>


</td>
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
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
