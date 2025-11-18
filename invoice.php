<?php
include("connect/config.php");
error_reporting(0);
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
	
    <title>Invoice</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 25px;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 18px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align:center;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
		.container-btn{
			text-align: center;
		}
		.btn{
			width: 170px;
			height: 40px;
			margin: 20px;
			font-size: 18px;
			border-radius: 5px;
			border: none;
			color: aliceblue;
			cursor: pointer;
			background-color:cadetblue;
		}
		
		.btn:hover{
			background-color:darkcyan;
		}
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">PURPLE PIG RESTAURANT</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Kuala Lumpur, Malaysia</p>
                        <p class="text-white">zoe0506@gmail.com</p>
                        <p class="text-white">+456-666-8888</p>
                    </div>
                </div>
            </div>
        </div>
		
			 <?php
											$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.user_id=users_orders.u_id where o_id='".$_GET['invoice']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);
												
												
																		
												?>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: <?php echo $rows['o_id']; ?></h2>
					<?php $date = strtotime($rows['date']); ?>
                    <p class="sub-heading"><strong>Order Date: </strong><?php echo date('d-M-Y',$date); ?> </p>
                    <p class="sub-heading"><strong>Email Address: </strong><?php echo $rows['email']; ?> </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading"><strong>Full Name: </strong>	<?php echo $rows['fname']; ?> </p>
                    <p class="sub-heading"><strong>Address: </strong>	<?php echo $rows['address']; ?></p>
                    <p class="sub-heading"><strong>Contact Number: </strong><?php echo $rows['contact']; ?></p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
						<th class="w-20">Quantity</th>
                        <th class="w-20">Price </th>
						<th class="w-20">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $rows['title']; ?></td>
                        <td><?php echo $rows['quantity']; ?></td>
						<td>RM <?php echo $rows['price']; ?></td>
						<td>RM <?php echo $rows['quantity']*$rows['price']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td>RM <?php echo $rows['quantity']*$rows['price']; ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>Payment Mode: </strong>Cash On Delivery</p>
        </div>

        <div class="body-section">
            <p style="text-align: center; margin-bottom: 5px;">Thank You For Your Orders!</p>
			<p style="text-align: center; margin-bottom: 5px;">We Hope To See You Again</p>
        </div>      
    </div> 
	<div class="container-btn">
	<a href="your_orders.php"><button class="btn">Back to Orders</button></a>
		</div>
</body>
</html>