<?php
include("connect/config.php");
error_reporting(0);
session_start();

include_once 'product-action.php';
?>
<?php
        if(isset($_GET['category_id']))
        {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM category_list WHERE id=$category_id";
            $res = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];
        }
        else
        {
            header("Location: index.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dishes</title>
	    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
</head>

<body>
	
	<!--navbar-->
	<?php include'nav.php' ?>
		
	<div class="heading">
		<h1><?php echo $category_title; ?></h1>
        <h3>&mdash; MENU &mdash; </h3>
	</div>
	
        <div class="page-wrapper" style="background-color: antiquewhite">
			<div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                         <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">Your Shopping Cart</h3>
							  		<div class="clearfix"></div>
                                </div>
							 
                                <div class="order-row bg-white">
                                    <div class="widget-body">
										<?php
										$item_total = 0;
										foreach ($_SESSION["cart_item"] as $item){ ?>									
									
                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="dishes.php?category_id=<?php echo $_GET['category_id']; ?>&action=remove&id=<?php echo $item["id"]; ?>" >
										<i class="fa fa-trash pull-right"></i></a>
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "RM".$item["price"]; ?> readonly id="exampleSelect1">   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
											</div>
										</div>
										
										<?php
										$item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
																				 }?>
									</div>
                                </div>

                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong><?php echo "RM".$item_total; ?></strong></h3>
                                        <p>Free Shipping</p>
                                        <a href="confirm-info.php" class="btn theme-btn btn-lg">Checkout</a>
                                    </div>
                                </div>
						</div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                      
                        <!-- end:Widget menu -->
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                           <h3 class="widget-title text-dark">
                              POPULAR ORDERS Delicious hot food!
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						
								

							<?php  // display values and item of food/dishes
									$stmt = $db->prepare("select * from menu_list where category_id='$_GET[category_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{ ?> 
								
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='dishes.php?category_id=<?php echo $_GET['category_id'];?>&action=add&id=<?php echo $product['id']; ?>'>
                                            <div class="dishes-logo pull-left">
                                                <a class="product-logo pull-left" href="#">
												<?php echo '<img src="admin/upload/food/'.$product['image'].'" alt="Food logo">'; ?></a>
                                            </div>
                                            <div class="dishes-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p><?php echo $product['about']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >RM <?php echo $product['price']; ?></span>
										  <input type="number" name="quantity"  style="margin-left:20px; width: 100px;" value="1" size="2" /><br><br>
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" />
										</div>
										</form>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                <!-- end:Food item -->
							
								
									<?php
									  }
									}
									
								?>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	</div>
    <?php include'footer.php' ?>

</body>

</html>
