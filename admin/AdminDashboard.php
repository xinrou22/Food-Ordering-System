<?php
include("../connect/config.php");
error_reporting(0);
session_start();

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<title>Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<!---Boxiocns CDN Link-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<script src="https://kit.fontawesome.com/ff0f2d874b.js" crossorigin="anonymous"></script>
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="img/pg-logo.png">
	
</head>

<body>
	
	<?php include("partial/nav.php"); ?>
	
	<!-- CONTENT -->
	<div class="content">
		<div class="subtitle-name">Dashboard</div>
			<div class="cont-1">
		  	<p class="amount"><?php $sql="select * from category_list";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></p><br><br><br><br>
				<p style="font-size: 18px; font-weight: 500;"><i class='bx bxs-category' style="color:#009879;font-size: 18px;"></i> Food Category</p>
		</div>
		
		<div class="cont-1">
		  	<p class="amount"><?php $sql="select * from menu_list";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></p><br><br><br><br>
				<p style="font-size: 18px; font-weight: 500;"><i class='bx bxs-bowl-hot' style="color:#476dff;font-size: 18px;"></i> Dishes</p>
		</div>
		
		<div class="cont-1">
		  	<p class="amount"><?php $sql="select * from users";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></p><br><br><br><br>
				<p style="font-size: 18px; font-weight: 500;"><i class='bx bxs-user' style="color:#ff4757;font-size: 18px;"></i> Customer</p>
		</div>
		
		<div class="cont-1">
		  	<p class="amount"><?php $sql="select * from users_orders";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></p><br><br><br><br>
				<p style="font-size: 18px; font-weight: 500;"><i class='bx bxs-cart-alt' style="color:#7d5fff;font-size: 18px;"></i> Orders</p>
		</div>
		
		<div class="cont-1">
		  	<p class="amount"><?php $sql="select * from admin";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></p><br><br><br><br>
				<p style="font-size: 18px; font-weight: 500;"><i class='bx bxs-user-circle' style="color:#ac64bd;font-size: 18px;"></i> Admin</p>
		</div>
	
	
</div>
</body>
</html>
