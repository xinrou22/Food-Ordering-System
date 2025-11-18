<?php
include("connect/config.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{
	foreach ($_SESSION["cart_item"] as $item){
		$item_total += ($item["price"]*$item["quantity"]);
		if($_POST['submit']){
			$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
			mysqli_query($db,$SQL);
			$success = "Thank you! Your Order Placed successfully!";
			header("refresh:1;url=your_orders.php");
		}
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Checkout</title>
	    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
	<style type="text/css">
		.payment{
			text-align: center;
		}
		.payment-method{
			width: 280px;
			height: 50px;
			border: none;
			padding: 10px;
			text-align: center;
			margin: 30px;
			color: antiquewhite;
			background-color:brown;
			cursor: pointer;
		}
	</style>
</head>

<body>
	
	<!--navbar-->
	<?php include'nav.php' ?>

	
	<div class="page-wrapper" style="background-color: antiquewhite">
		
		<span style="color:green; margin-left: 60px;"><?php echo $success; ?></span>
		
	 <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                           <br> <h4 style="text-align: center; font-weight: 600">Cart Summary</h4><br>
										</div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
                                                    <tr bgcolor="#00000">
														<td style="text-align: center"><strong style="color: white">Item</strong></td>
														<td style="text-align: center"><strong style="color: white">Shipping &amp; Handling</strong></td>
														<td style="text-align: center"><strong style="color: white">Quantity</strong></td>
														<td style="text-align: center"><strong style="color: white">Price</strong></td>
														<td style="text-align: center"><strong style="color: white">SubTotal</strong></td>
                                                    </tr>
												<?php foreach ($_SESSION["cart_item"] as $item) { ?>
												  <tr>
														<td style="text-align: center"><?php echo $item["title"]; ?></td>
													    <td style="text-align: center">free shipping</td>
													    <td style="text-align: center"><?php echo $item["quantity"]; ?></td>
														<td style="text-align: center"><?php echo "RM ".$item["price"]; ?></td>
													    <td style="text-align: center"><?php echo "RM ".$item["price"]*$item["quantity"]; ?></td>
                                                    </tr><?php } ?>
                                                   
                                                    <tr bgcolor="#DCD1D1">
														<td></td>
														<td></td>
														<td></td>
                                                        <td style="text-align: center" class="text-color"><strong>Total</strong></td>
                                                        <td style="text-align: center" class="text-color"><strong> <?php echo "RM ".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
	
                                            </table>
                                        </div>
                                    </div>
									<hr />
                                        <div class="payment">
												<input readonly class="payment-method" value="Payment Mode: Cash On Delivery">
                                        </div>
									
										<a href="your_orders.php"><p class="text-xs-center"> <input type="submit"  name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p></a>
	
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
		<br><br><br>
	</div>
	<?php include'footer.php' ?>
</body>
</html>