
<!doctype html>
<html lang="en" dir="ltr"> 
<head>
<title>Manage Product</title>
	<meta charset="utf-8">
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
	
</head>

<body>
	
	<?php include("partial/nav.php"); ?>
	
	<!-- CONTENT -->
	<div class="content">
		<div class="subtitle-name">Manage Products</div>
		<a href="add-product.php" class="add">Add Product</a>	
		<table class="info-product">
			<thead>
				<tr>
					<th>S.N.</th>
					<th>Category</th>
				    <th>Name</th>
				    <th>Slogan</th>
				    <th>Price</th>
					<th>Image</th>
				    <th>Action</th>
				</tr>
			</thead>
			<tbody>
	
			<tbody>
			<?php 
				$sql="SELECT * FROM menu_list";
				$query=mysqli_query($db,$sql);
                        if($query==TRUE)
                        {
                            $count = mysqli_num_rows($query); 
							$sn=1; 
                            if($count>0)
                            {
								while($rows=mysqli_fetch_array($query)){
									$mql="select * from category_list where id='".$rows['category_id']."'";
									$newquery=mysqli_query($db,$mql);
									$fetch=mysqli_fetch_array($newquery);
																				
																				
									echo '<tr>
									<td>'.$sn++.' </td>
									<td>'.$fetch['title'].'</td>
									<td>'.$rows['title'].'</td>
									<td>'.$rows['about'].'</td>
									<td>RM'.$rows['price'].'</td>
									<td><img src="upload/food/'.$rows['image'].'" width="100px"></td>
									<td>																
										  <a href="delete-product.php?id='.$rows['id'].'" class="delete"><button class="delete-btn"><i class="fa-solid fa-trash-can"></i></button></a><br><br>
										  <a href="update-product.php?product_upd='.$rows['id'].'"><button class="update-btn"><i class="fa-solid fa-pen"></i></button></a>
                                    </td>
									</tr>';
								}
							}
							else
							{
								
                            ?>

                            <tr>
                                <td colspan="7"><div class="error">No Product Added.</div></td>
                            </tr>

                            <?php
							}
						}
                                            
       
                    ?>
	 </tbody>
</table>
	<br><br><br>
</div>
</body>
</html>
