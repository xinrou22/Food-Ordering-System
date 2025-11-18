<?php 
session_start(); 
error_reporting(0); 
include("../connect/config.php"); 
if(isset($_POST['submit'] )) 
{
	$check_username= mysqli_query($db, "SELECT username FROM admin where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM admin where email = '".$_POST['email']."' ");
	
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
       	$message = "Invalid email address. Please type a valid email!";
    }
	elseif(strlen($_POST['contact']) < 10)  
	{
		$message = "Invalid contact number!";
	}
	elseif(strlen($_POST['password']) < 6)  
	{
		$message = "Password must be 6 or more digits";
	}
	elseif(mysqli_num_rows($check_username) > 0) 
     {
    	$message = 'Username already exists!';
     }
	elseif(mysqli_num_rows($check_email) > 0)
     {
    	$message = 'Email already exists!';
     }
	else{
	$mql = "INSERT INTO admin(fname,username,email,contact,password) VALUES('".$_POST['fname']."','".$_POST['username']."','".$_POST['email']."','".$_POST['contact']."','".$_POST['password']."')";
	mysqli_query($db, $mql);
		$success = "Account Created successfully!";	
		
		 header("refresh:1;url=index.php"); 
    }
}
?>

<!doctype html>
<html lang="en">
<head>  
	<title>Admin Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--page-icon------------>
    <link rel="shortcut icon" href="img/pg-logo.png">
	
    <style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
		
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;}

		body{
			font-weight: 700;
			color: #555;
			background-color: #ecf0f3;	
			margin: 50px 35%;}
		
		.login-div{
			width: 400px;
			padding: 60px 35px 35px 35px;
			border-radius: 40px;
			background-color:#ecf0f3;
			box-shadow: 13px 13px 20px #a7aaaf, -13px -13px 20px #fff;}
		
		.logo{
			background: url("img/pg-logo.png");
			width: 100px;
			height: 100px;
			margin: 0 auto;
			border-radius: 50%;
			box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff;}
		
		.title{
			text-align: center;
			font-size: 28px;
			padding-top: 24px;
			letter-spacing: 0.5px;
			color: #B775A6;}
		
		.field{
			width: 100%;
			padding: 20px 5px 5px 5px;}
		
		.field input{
			border: none;
			outline: none;
			background: none;
			font-size: 18px;
			color: #555;
			padding: 20px 10px 20px 5px;}
		
		.box, .password{
			margin-bottom: 20px;
			border-radius: 25px;
			box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;}
		
		.field svg{
			height: 22px;
			margin: 0 10px -3px 25px;}
		
		.login-btn{
			outline: none;
			border: none;
			cursor: pointer;
			width: 100%;
			height: 60px;
			border-radius: 30px;
			font-size: 20px;
			font-weight: 700;
			color: #fff;
			text-align: center;
			background-color: aquamarine;
			box-shadow: 3px 3px 8px #b1b1b1, -3px -3px 8px #fff;
			transition: all 0.5s;}
		
		.login-btn:hover{
			background-color: #50e5b9;}
		
		form p{
			padding-top: 25px;
			text-align: center;
			font-weight: 100;
			font-size: 15px;
		}
		
		form p a{
			text-decoration: none;
			color:#B12EB9;
		}
	</style>
 </head>
<body>
	<div class="login-div">
		<form action="" method="POST">
		<div class="logo"><img src="img/pg-logo.png" style="width: 100px; height: 100px"></div>
		<div class="title">Purple Pig</div>
	<span style="color:red;"><?php echo $message; ?></span>
			<span style="color:green;"><?php echo $success; ?></span>
		<div class="field">
			<div class="box">
			<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
						</svg>
				<input type="text" name="fname" class="user-input" placeholder="Full Name" required>
			</div>
			
				<div class="box">
			<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
						</svg>
				<input type="text" name="username" class="user-input" placeholder="Username" required>
			</div>
			
				<div class="box">
			<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
						</svg>
				<input type="email" name="email" class="user-input" placeholder="Email Address" required>
			</div>
			
				<div class="box">
			<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z"></path>
						</svg>
				<input type="tel" name="contact" class="user-input" placeholder="Contact Number" required>
			</div>
			
			<div class="password">
				<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
						</svg>
				<input type="password" name="password" class="pass-input" placeholder="password" required>
			</div>
		</div>
		<button type="submit" name="submit" class="login-btn">Register</button>
			<p>Already registered?<a href="index.php"> Sign In</a></p>
		</form>
	</div>
</body>
</html>

