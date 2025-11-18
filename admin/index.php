<?php 

include("../connect/config.php");

error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))   
{
	
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	$loginquery ="SELECT * FROM admin WHERE username='$username' AND password='".($password)."'"; 
	$result=mysqli_query($db, $loginquery); 
	
	                        if($result->num_rows > 0)  
								{
										$row = mysqli_fetch_assoc($result);
                                    	$_SESSION["user_id"] = $row['admin_id']; 
										$_SESSION['username'] = $row['username'];
										$success = "Successfully logged in!";
										 header("refresh:1;url=AdminDashboard.php"); 
	                            } 
							else {
								$message = "Invalid Username or Password!"; 
							}                  
	
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Admin Login</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
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
			height: 100vh;
			width: 100vh;
			overflow: hidden;
			font-weight: 700;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #555;
			background-color: #ecf0f3;	
			margin: 0.5% auto;}
		
		.login-div{
			width: 400px;
			height: 560px;
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
		
		.username, .password{
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
			<div class="username">
			<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
						</svg>
				<input type="text" name="username" class="user-input" placeholder="username" required>
			</div>
			
			<div class="password">
				<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
						</svg>
				<input type="password" name="password" class="pass-input" placeholder="password" required>
			</div>
		</div>
		<button type="submit" name="submit" class="login-btn">Login</button>
			<p>Not registered?<a href="AdminRegister.php"> Create an account</a></p>
		</form>
	</div>
</body>
</html>
	
		
	
