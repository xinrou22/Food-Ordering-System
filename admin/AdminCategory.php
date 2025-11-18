<?php include("../connect/config.php");

if(isset($_POST['submit'] ))
{
	$check_cat= mysqli_query($db, "SELECT title FROM category_list where title = '".$_POST['title']."' ");
	if(mysqli_num_rows($check_cat) > 0){
    	$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>Category already exist!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';}
	else{
		$fname = $_FILES['image']['name'];
		$temp = $_FILES['image']['tmp_name'];
		$fsize = $_FILES['image']['size'];
		$extension = explode('.',$fname);
		$extension = strtolower(end($extension));  
		$fnew = uniqid().'.'.$extension;
		$store = "upload/category/".basename($fnew);
		if($extension == 'jpg'||$extension == 'png'||$extension == 'jpeg' ){
			if($fsize>=3000000){
				$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>Max Image Size is 3000000kb!</strong> Try different Image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}else{
				$sql = "INSERT INTO category_list(title,image) VALUE('".$_POST['title']."','".$fnew."')";
				mysqli_query($db, $sql);
				move_uploaded_file($temp, $store);
				$success = 	'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrass!</strong> New Category Added Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
		}else{
			$error = '<div class="alert alert-danger alert-dismissible fade show"><strong>Invalid extension! </strong>png, jpg, gif are accepted.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'	;
		}
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Categories</title>
	<link rel="stylesheet" href="css/style.css">
	<!---Boxiocns CDN Link-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	 <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	
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
			
									<?php  
									        echo $error;
									        echo $success; ?>
			
			<div class="subtitle-name">Manage Food Category</div>	
			<div class="card">
				<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
				<div class="card-title">Add Category</div>
				<div class="add-category">
			<div class="input-group">
				<span class="details">Title</span>
				<input type="text" name="title" class="input" placeholder="Title of Category" required>
			</div>
					
			<div class="input-group">
				<span class="details">Image</span>
				<input type="file" name="image" class="input" required>
			</div>

				</div>
				<button name="submit" class="btn-save">Save</button>
				</form>
			</div>
			
		<table class="info-category">
			<thead>
				<tr>
					<th>S.N.</th>
				    <th>Title</th>
					<th>Image</th>
				    <th>Action</th>
				</tr>
			</thead>
			
			<tbody>
				
                    <?php 
                        $sql = "SELECT * FROM category_list";
                        $res = mysqli_query($db, $sql);
                        $count = mysqli_num_rows($res);
                        $sn=1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image = $row['image'];?> 
				<tr>
					<td><?php echo $sn++; ?>. </td>
                    <td><?php echo $title; ?></td>
					<td> <?php
								if($image!="") {?>
						<img src="upload/category/<?php echo $image; ?>" width="100px">
						<?php }else
								{ echo "<div class='error'>Image not Added.</div>"; } ?>
					</td>
					<td>
						<a href="delete-category.php?id=<?php echo $id ?>&image=<?php echo $image; ?>" class="delete"><button class="delete-btn"><i class="fa-solid fa-trash-can"></i> Delete</button></a>
					</td>
				</tr>
				<?php }}
				else{ ?>
				<tr>
					<td colspan="6"><div class="error">No Category Added.</div></td>
				</tr> <?php } ?>
             </table>
	</tbody>
	<br><br><br>
	</div>
	<script>
	
	$('.btn-close').click(function(){
           $('.alert').addClass("hide");
         });
	
	
	</script>
</body>
</html>