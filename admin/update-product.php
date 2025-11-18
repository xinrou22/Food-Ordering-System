<?php 
include("../connect/config.php"); 

error_reporting(0);
session_start();
				
?>

<?php
if(isset($_POST['submit']))           //if upload btn is pressed
{
	if(empty($_POST['title'])||$_POST['price']==''){
		$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>All fields must be filled ! </strong>Except the slogan is optional.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}else{
		$sql = "UPDATE menu_list SET title='$_POST[title]',about='$_POST[about]',price='$_POST[price]' where id='$_GET[product_upd]'";
		mysqli_query($db, $sql); 
		move_uploaded_file($temp, $store);
		$success = 	'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Update completed!</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		header("refresh:1;url=AdminProduct.php");}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Product</title>
	
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
</head>

<body>
		<?php include("partial/category-nav.php"); ?>
	
	<!-- CONTENT -->
	<div class="content">
		
									<?php  echo $error;
									        echo $success; ?>
	       <div class="card">
			   
			   <div class="card-title">Update Product</div>
			   
			   
			   <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
				<div class="add-product">
					
					<?php $qml ="select * from menu_list where id='$_GET[product_upd]'";
													$rest=mysqli_query($db, $qml); 
													$roww=mysqli_fetch_array($rest);
														?>
					
			<div class="input-group">
				<span class="details">Name</span>
				<input type="text" name="title" value="<?php echo $roww['title'];?>" placeholder="Name of the food">
			</div>
					
			<div class="input-group">
				<span class="details">About</span>
				<input type="text" name="about" value="<?php echo $roww['about'];?>" placeholder="Slogan">
			</div>
					
			<div class="input-group">
				<span class="details">Price</span>
				<input type="number" name="price" value="<?php echo $roww['price'];?>" placeholder="RM">
			</div>

					
			</div>
				   <button name="submit" class="btn-save">Save</button>	   
		</form>
			   <a href="AdminProduct.php"><button class="btn-cancel">Back</button></a>
		</div>
  </div>
	
		<script>
	
	$('.btn-close').click(function(){
           $('.alert').addClass("hide");
         });
	
	
	</script>

</body>
</html>