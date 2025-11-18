<!DOCTYPE html>
<html lang="en">
<?php
include("connect/config.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">

	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
    <title>Categories</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
        <?php include'nav.php' ?>
	<div class="heading">
		<br>
        <h1>&mdash; CATEGORY &mdash; </h1>
		<br>
	</div>
	
 <div class="page-wrapper" style="background-color: antiquewhite">
	 <section class="category" id="category">
		 <div class="category-container">
			 <?php $ress= mysqli_query($db,"select * from category_list");
			 while($rows=mysqli_fetch_array($ress)){
				 echo' <a href="dishes.php?category_id='.$rows['id'].'" class="box">
				 <img src="admin/upload/category/'.$rows['image'].'">
				 <div class="btn-view">'.$rows['title'].'</div></a>';}
			 ?>
		 </div>
	 </section>

  
           <?php include'footer.php' ?>
      </div>
</body>

</html>