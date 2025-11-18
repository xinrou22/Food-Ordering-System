<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Orders</title>
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
	
	<style type="text/css">
		textarea {
  	resize: none;
	padding: 5px;
}
	</style>
</head>

<body>
	<?php include("partial/nav.php"); ?>
	<!-- CONTENT -->
		<div class="content">
			
									
			<div class="subtitle-name">All Orders</div>	
			
		<table class="order-table">
			<thead>
				<tr>
					<th>S.N.</th>
				    <th>Username</th>
				    <th>Item</th>
				    <th>Qty</th>
				    <th>Price</th>
					<th>Address</th>
					<th>Status</th>
					<th>Order-Date</th>
					<th>Remark</th>
					<th>Actions</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
				$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.user_id=users_orders.u_id ";
				$query=mysqli_query($db,$sql);
				$sn=1;
				if(!mysqli_num_rows($query) > 0 ){
					echo '<td colspan="10"><center>No Orders Data!</center></td>';
				}else{
					while($rows=mysqli_fetch_array($query)){
				?>
				<?php echo ' <tr>
				<td>'.$sn++.'</td>
				<td>'.$rows['username'].'</td>
				<td>'.$rows['title'].'</td>
				<td>'.$rows['quantity'].'</td>
				<td>RM'.$rows['price'].'</td>
				<td>'.$rows['address'].'</td>';
				?>
				<?php 
						$status=$rows['status'];
						if($status=="" or $status=="NULL"){?>
				<td> <button type="button" class="btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true"> Dispatch</button></td>
					<?php }
						if($status=="in process") { ?>
				<td> <button type="button" class="btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On a Way!</button></td>
				<?php }
						if($status=="closed"){ ?>
				<td> <button type="button" class="btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"> Delivered</button></td>
					<?php } ?>
					<?php
						if($status=="rejected"){ ?>
				<td> <button type="button" class="btn-danger-order"> <i class="fa fa-close"></i> Cancelled</button></td>
				<?php } ?>
				<?php echo '<td>'.$rows['date'].'</td>'; ?>
				<?php echo '<td><textarea readonly cols="10" rows="5">'.$rows['remark'].'</textarea></td>'; ?>
				<td>
					<a href="delete-orders.php?order_del=<?php echo $rows['o_id'];?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><button class="delete-btn"><i class="fa fa-trash-o" style="font-size:16px"></i></button></a><br><br>
					<?php
						echo '<a href="view-order.php?user_upd='.$rows['o_id'].' class="update-btn"><button class="update-btn"><i class="fa-solid fa-gear" style="font-size:16px"></i></button></a></td></tr>';
					}
				} ?>
                                             
			
	 </tbody>
</table>
			<br><br><br>
</div>
</body>
</html>