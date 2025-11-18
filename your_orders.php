<?php
include("connect/config.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))
{
	header('location:login.php');
}
else
{  

?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <title>Order</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ff0f2d874b.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
	
	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	
<style type="text/css" rel="stylesheet">

.order-table
{
    border-collapse: collapse;
	margin-top: -80px;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
	width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    text-align: center;
}
	
.order-table thead tr 
{
    background-color: #7d5fff;
    color: #ffffff;
}
	
.order-table th,
.order-table td 
{
    padding: 12px 15px;
}
	
.order-table tbody tr 
{
    border-bottom: 1px solid #dddddd;
	font-weight: 500;
    color: black;
}

.order-table tbody tr:nth-of-type(even) 
{
    background-color: #f3f3f3;
}

.order-table tbody tr:last-of-type 
{
    border-bottom: 2px solid #7d5fff;
}
	
	textarea {
  resize: none;
	padding: 5px;
}
	</style>

	</head>

<body>
    
	<!--navbar-->
	<?php include'nav.php' ?>
		<div class="heading">
			<br>
        <h1>&mdash; YOUR ORDERS &mdash; </h1>
			<br>
	</div>
	
        <div class="page-wrapper">
			<h1 align="center">Recent Orders</h1><br>
<section>
       <table class="order-table">
			<thead>
				<tr>
					<th style="text-align: center">Item</th>
				    <th style="text-align: center">Quantity</th>
				    <th style="text-align: center">Price</th>
					<th style="text-align: center">Order Date</th>
					<th style="text-align: center">Status</th>
					<th style="text-align: center">Actions</th>
					<th style="text-align: center">Remark</th>
				</tr>
			</thead>
						  <tbody>
						  <?php 
						// displaying current session user login orders 
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="7"><center>You have No orders Placed yet. </center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
											  $status=$row['status']; 
											  if($status=="" or $status=="NULL" or $status=="in process" or $status=="rejected") { 
							  ?>
							  <tr>
								  <td data-column="Item"> <?php echo $row['title']; ?></td>
								  <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
								  <td data-column="price">RM<?php echo $row['price']; ?></td>
								  <td data-column="Date"> <?php echo $row['date']; ?></td>
								  <td data-column="status">
									  
									  <?php 
												  $status=$row['status'];
												  if($status=="" or $status=="NULL"){ ?>
									  
									  <button type="button" class="btn btn-info" style="font-weight:bold;"> Dispatch</button>
									  <?php }
												  if($status=="in process"){ ?>
									  
									  <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On a Way!</button>
									  <?php } ?>
									  <?php
												  if($status=="rejected"){ ?>
									  
									  <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
									  <?php } ?>
									  
								  </td>
								  
								    <td data-column="Action">
										<?php 
												  $status=$row['status'];
												  if($status=="" or $status=="NULL"){ ?>
										<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancel</button>
										<!-- Modal --> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Are you sure you want to cancel your order?</h5>
      </div>
      <div class="modal-footer">
        <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>"><button type="button" class="btn btn-primary">Yes</button></a>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
										
									  <?php }
												  if($status=="in process"){ ?>
									  
									    <a href="update_status.php?upd=<?php echo $row['o_id'];?>"><button class="received-brn">Received Food</button></a>
										
									  <?php } ?>
									  <?php
												  if($status=="rejected"){ ?>
										<a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa-solid fa-trash-can" style="font-size:16px"></i></a>
										
									  <?php } ?>
									  
								  </td>
								  
								  <td data-column="remark">
									  <textarea readonly><?php echo $row['remark']; ?></textarea>
								  </td>
							  </tr>
							  
							  <?php }}} ?>
		   </tbody>
	</table>
			</section>

<h1 align="center">All Orders</h1><br>
<section>
		
       <table class="order-table">
			<thead>
				<tr>
					<th style="text-align: center">Date</th>
					<th style="text-align: center">Item</th>
				    <th style="text-align: center">Quantity</th>
				    <th style="text-align: center">Price</th>
					<th style="text-align: center">Status</th>
					<th style="text-align: center">Actions</th>
				</tr>
			</thead>
						  <tbody>
						  <?php 
						// displaying current session user login orders 
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
											  $status=$row['status']; 
                            if($status=="closed") { 
						
							?>
						  
						
												<tr>	<?php $cDate = strtotime($row['date']); ?>
														<td data-column="Date"> <?php echo date('d-M-Y',$cDate); ?></td>
														<td data-column="Item"> <?php echo $row['title']; ?></td>
														<td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														<td data-column="price">RM<?php echo $row['price']; ?></td>
														<td data-column="status"><button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"> Delivered</button></td>
														   <td data-column="Action"> <a href="invoice.php?invoice=<?php echo $row['o_id'];?>"><button class="btn-invoice"><i class="fa-solid fa-file-lines" style="font-size:16px"></i> Invoice</button></a> 
															</td>
														 
												</tr>
												
											
														<?php }}} ?>					
							
							
										
						
						  </tbody>
					</table>

            </section>     
        </div>
  <?php include'footer.php' ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
?>