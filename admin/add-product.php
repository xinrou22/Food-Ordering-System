<?php 
include("../connect/config.php"); 

error_reporting(0);
session_start();


if(isset($_POST['submit']))           //if upload btn is pressed
{
	$check_cat= mysqli_query($db, "SELECT title FROM menu_list where title = '".$_POST['title']."' ");
	if(mysqli_num_rows($check_cat) > 0)
     {
    	$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>Product already exist!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
     }
	else{
	
	
		if(empty($_POST['title'])||$_POST['price']==''||$_POST['category']=='')
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>All fields must be filled ! </strong>Except the slogan is optional.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
	else
		{
		
								$fname = $_FILES['image']['name'];
								$temp = $_FILES['image']['tmp_name'];
								$fsize = $_FILES['image']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "upload/food/".basename($fnew);                      // the path to store the upload image
	
					if($extension == 'jpg'||$extension == 'png'||$extension == 'jpeg' )
					{        
									if($fsize>=1000000)
										{
										$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>Max Image Size is 1024kb!</strong> Try different image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
										
	   
										}
		
									else
										{
										$sql = "INSERT INTO menu_list(title,about,price,category_id,image) VALUE('".$_POST['title']."','".$_POST['about']."','".$_POST['price']."','".$_POST['category']."','".$fnew."')";  // store the submited data ino the database :images
										mysqli_query($db, $sql); 
										move_uploaded_file($temp, $store);
										
										$success = 	'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrass!</strong> New Food Added Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
										header("refresh:1;url=AdminProduct.php");
                
	
										}
					}
					else{
						$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>Invalid extension! </strong>png, jpg, gif are accepted.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
					}
	}
	}
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Product</title>
	
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
			   
			   <div class="card-title">Add Product</div>
			   
			   
			   <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
				<div class="add-product">
			<div class="input-group">
				<span class="details">Name</span>
				<input type="text" name="title" placeholder="Name of the food" required>
			</div>
					
			<div class="input-group">
				<span class="details">About</span>
				<input type="text" name="about" placeholder="Slogan">
			</div>
					
			<div class="input-group">
				<span class="details">Price</span>
				<input type="number" name="price" placeholder="RM" required>
			</div>
					
			<div class="input-group">
				<span class="details">Image</span>
				<input type="file" name="image" id="image" class="input" required>
			</div>
					
					
			<div class="input-group">
				<span class="details">Select Category</span>
				   <div class="custom_select">
            <select name="category">
              <option value=""> </option>
				<?php 
                                
                                $sql2 = "SELECT * FROM category_list";
                                
                                $res = mysqli_query($db, $sql2);

                                $count = mysqli_num_rows($res);
				
                                if($count>0)
                                {
                                    
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            
                            ?>
										 
            </select>
          </div>
		   </div>
					
			</div>
				   <button name="submit" class="btn-save">Save</button>	   
		</form>
			   <a href="AdminProduct.php"><button class="btn-cancel">Cancel</button></a>
		</div>
  </div>
	
		<script>
	
	$('.btn-close').click(function(){
           $('.alert').addClass("hide");
         });
	
	
	</script>

</body>
</html>