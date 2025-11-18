<?php 
include("../connect/config.php"); 

error_reporting(0);
session_start();

  if(isset($_POST['update']))
  {
	  $user_upd=$_GET['user_upd'];
	  $status=$_POST['status'];
	  $remark=$_POST['remark'];
	  $sql=mysqli_query($db,"update users_orders set status='$status',remark='$remark' where o_id='$user_upd'");

	  $success = 	'<div class="alert alert-success alert-dismissible fade show" role="alert">
  												<strong>Congrass!</strong> Updated Successfully.
  												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	 header("refresh:1;url=AdminOrder.php");

  }


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Order</title>
	
	<link rel="stylesheet" href="css/style.css">
	<!---Boxiocns CDN Link-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	 <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<script src="https://kit.fontawesome.com/ff0f2d874b.js" crossorigin="anonymous"></script>
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="img/pg-logo.png">
	<style type="text/css">
	table { 
		width: 100%; 
		border-collapse: collapse; 
		margin: auto;
		margin-top:5px;
		margin-bottom: 50px;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #004684; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc;
	font-size: 18px;
	}

textarea {
  resize: none;
	padding: 5px;
}

	</style>
</head>

<body>
		<?php include("partial/category-nav.php"); ?>
	
	<!-- CONTENT -->
	<div class="content">

	       <div class="card">
			   
			   <div class="card-title">View User's Order</div>
			   <?php echo $success; ?>
			   
			   
			   <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
				
					
		<table>
			
			 <?php
			$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.user_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
			$query=mysqli_query($db,$sql);
			$rows=mysqli_fetch_array($query);
			?>
			
			<tr>
				<td style="width: 200px;"><strong>Username :</strong></td>
				<td><?php echo $rows['username']; ?></td>
			
			</tr>
			
			<tr>
				<td style="width: 200px;"><strong>Title :</strong></td>
				<td><?php echo $rows['title']; ?></td>
			
			</tr>
			
			<tr>
				<td style="width: 200px;"><strong>Quantity :</strong></td>
				<td><?php echo $rows['quantity']; ?></td>
			
			</tr>
			
			<tr>
				<td style="width: 200px;"><strong>Price :</strong></td>
				<td>RM <?php echo $rows['price']; ?></td>
			
			</tr>
			
			<tr>
				<td style="width: 200px;"><strong>Address :</strong></td>
				<td><?php echo $rows['address']; ?></td>
			
			</tr>
			
			<tr>
				<td style="width: 200px;"><strong>Date :</strong></td>
				<td><?php echo $rows['date']; ?></td>
			
			</tr>
					
			<tr>
				<td style="width: 200px;"><strong>Status :</strong></td>
				<td>
					<select name="status">
						<option value="">Select Status</option>
      					<option value="in process">In Process</option>
	 					<option value="rejected">Rejected</option>	 
       				</select>
          		</td>
			</tr>	
			<tr>
				<td style="width: 200px;"><strong>Remark :</strong></td>
				<td>
					<textarea cols="50" rows="5" name="remark"><?php echo $rows['remark']; ?></textarea>
          		</td>
			</tr>
		</table>
					
			
				   <button name="update" class="btn-save">Update</button>	   
		</form>
			   <a href="AdminOrder.php"><button class="btn-cancel">Back</button></a>
		</div>
  </div>
	
		<script>
	
	$('.btn-close').click(function(){
           $('.alert').addClass("hide");
         });
	
	
	</script>

</body>
</html>