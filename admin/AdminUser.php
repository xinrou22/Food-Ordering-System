<!doctype html>
<html lang="en" dir="ltr">
<head>
<title>Manage Admin</title>
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
		<div class="subtitle-name">Customer Information</div>
		
		<table class="info-user">
			<thead>
				<tr>
					<th>S.N.</th>
				    <th>Fullname</th>
				    <th>Username</th>
				    <th>Contact No.</th>
				    <th>Email</th>
					<th>Address</th>
				</tr>
			</thead>
			
			<tbody>
			<?php 
                      
                        $sql = "SELECT * FROM users";
                        $res = mysqli_query($db, $sql);
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res); 
                            $sn=1; 
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $fname=$rows['fname'];
                                    $username=$rows['username'];
									$contact=$rows['contact'];
									$email=$rows['email'];
									$address=$rows['address'];
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td> 
                                        <td><?php echo $fname; ?></td>
                                        <td><?php echo $username; ?></td>
										<td><?php echo $contact; ?></td>
										<td><?php echo $email; ?></td>
										<th><?php echo $address; ?></th> 
                                    </tr>
                           <?php } }
							else{ ?>
				<tr><td colspan="6"><div class="error">No customer</div></td></tr>
				<?php } }?>
	 </tbody>
</table>
		<br><br><br>
		<div class="subtitle-name">Admin Information</div>
		
				<table class="info-admin">
			<thead>
				<tr>
					<th>S.N.</th>
				    <th>Fullname</th>
				    <th>Username</th>
				    <th>Contact No.</th>
				    <th>Email</th>
				</tr>
			</thead>
			
			<tbody>
			<?php 
				$sql = "SELECT * FROM admin";
                $res = mysqli_query($db, $sql);
				if($res==TRUE){
					$count = mysqli_num_rows($res);
					$sn=1;
					if($count>0)
					{
						while($rows=mysqli_fetch_assoc($res))
						{
							$id=$rows['id'];
                            $fname=$rows['fname'];
                            $username=$rows['username'];
							$contact=$rows['contact'];
							$email=$rows['email']; ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td> 
                                        <td><?php echo $fname; ?></td>
                                        <td><?php echo $username; ?></td>
										<td><?php echo $contact; ?></td>
										<td><?php echo $email; ?></td>
                                    </tr>
                           <?php  } }
                            else{
                            }
				}?>
	 </tbody>
</table>
	
</div>
</body>
</html>
