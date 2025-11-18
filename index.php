<!DOCTYPE html>
<html lang="en">
<?php
include("connect/config.php");
error_reporting(0); 
session_start(); 

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Homepage</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
		<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
	</head>

	
<body class="home">
    
        <?php include'nav.php' ?>
        <!-- banner part starts -->
        <section class="hero bg-image" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),url(images/img/home.jpg);">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>Order Delivery </h1>
					<br><br><br><br>
              
                    <div class="steps">
                        <div class="step-item step1">
                            <img src="images/icon-1.png" alt="" width="40px" height="40px" style="margin-left: 30px">
                            <h4><span>1. </span>Choose Dishes</h4> </div>
                        <div class="step-item step2">
                            <img src="images/icon-2.png" alt="" width="40px" height="40px" style="margin-left: 30px">
                            <h4><span>2. </span>Order Food</h4> </div>
                        <div class="step-item step3">
                            <img src="images/icon-3.png" alt="" width="40px" height="40px" style="margin-left: 50px">
                            <h4><span>3. </span>Delivery</h4> </div>
                    </div>
                </div>
            </div>
        </section>
	

        <section class="popular" style="background-color: antiquewhite">
            <div class="container">
                <div class="title text-xs-center m-b-30">
                    <h2>Popular Dishes of the Month</h2>
                    <p class="lead">The easiest way to your favourite food</p>
                </div>
                <div class="row">
						<?php $query_res= mysqli_query($db,"select * from menu_list LIMIT 3"); 
									      while($r=mysqli_fetch_array($query_res))
										  {
											  echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
														<div class="food-item-wrap">
															<div class="figure-wrap bg-image">
																<img src="admin/upload/food/'.$r['image'].'" class="figure-wrap bg-image" width="100%">
																</div>
															<div class="content">
																<h5><a href="dishes.php?category_id='.$r['category_id'].'">'.$r['title'].'</a></h5>
																<div class="product-name">'.$r['slogan'].'</div>
																<div class="price-btn-block"> <span class="price">RM'.$r['price'].'</span> <a href="dishes.php?category_id='.$r['category_id'].'" class="btn theme-btn-dash pull-right">Order Now</a> </div>
															</div>
															</div>
															</div>';}?>
				</div>
            </div>
        </section>
	
        <div class="header2"></div>
        <!-- How it works block starts -->
        <section class="how-it-works">
            <div class="container">
                <div class="text-xs-center">
                    <h2>Easy 3 Step Order</h2>
                    <!-- 3 block sections starts -->
                    <div class="row how-it-works-solution">
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                            <div class="how-it-works-wrap">
                                <div class="step step-1">
                                    <div class="icon" data-step="1">
                                        <img src="images/icon-1.png" alt="">
                                    </div>
                                    <h3>Choose dishes</h3>
                                    <p>We have provided you with a variety of delicious food to choose from.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                            <div class="step step-2">
                                <div class="icon" data-step="2">
                                    <img src="images/icon-2.png" alt="">
                                </div>
                                <h3>Place order</h3>
                                <p>Choose your food, don't hesitate to place your order!</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                            <div class="step step-3">
                                <div class="icon" data-step="3">
                                    <img src="images/icon-3.png" alt="">
                                </div>
                                <h3>Delivery</h3>
                                <p>Get your food delivered! And enjoy your meal! Cash on delivery.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
               
            </div>
        </section>
<div class="header2">
</div>

<section>
	<div class="container">
		
		<h1 style="text-align: center;">Our Location</h1><br>
		<h5 style="text-align: center;">Our restaurant is located in Kuala Lumpur, so our delivery location is only in Kuala Lumpur.</h5><br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.20923798658!2d101.68978921885363!3d3.146805938780541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49d3e30988d7%3A0x464a4b7fda23c09a!2sKuala%20Lumpur%20City%20Centre%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1648973796379!5m2!1sen!2smy" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br>


</div>
</section>
      
<?php include'footer.php' ?>

</body>
</html>