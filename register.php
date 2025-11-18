<?php
session_start(); 
error_reporting(0); 
include("connect/config.php"); 
if(isset($_POST['submit'] )) {
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
	
	if($_POST['password'] != $_POST['cpassword']){  
       	$message = "Password not match";
    }
	elseif(strlen($_POST['password']) < 6)  
	{
		$message = "Password must be 6 digits or more than 6.";
	}
	elseif(strlen($_POST['contact']) < 10 ) 
	{
		$message = "Invalid phone number!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
       	$message = "Invalid email address. Please type a valid email!";
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
		$mql = "INSERT INTO users(fname,username,password,email,contact,address) VALUES('".$_POST['fname']."','".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['contact']."','".$_POST['address']."')";
		mysqli_query($db, $mql);
		$success = "Account Created successfully!";
		header("refresh:1;url=login.php"); 
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">

	<title>Register</title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600&display=swap');
		*{
   font-family: 'Dosis', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   transition: all 0.4s cubic-bezier(.43,1.1,.62,1.08);
}
body {
   width: 100%;
   min-height: 100vh;
   background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/login-bg.jpg");
   background-position: center;
   background-size: cover;
   
   justify-content: center;
   align-items: center;
}

.wrapper{
  max-width: 700px;
  width: 100%;
  background: #fff;
  margin: 50px auto;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.125);
  padding: 30px;
  border-radius: 5px;
}

.wrapper .login-text{
    color: #111;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}

.wrapper form{
  width: 100%;
}

.wrapper form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper form .inputfield label{
   width: 200px;
   color: #782375;
   margin-right: 10px;
  font-size: 18px;
	font-weight: 500;

}

.wrapper form .inputfield .input,
.wrapper form .inputfield .textarea{
    height: 45px;
	width: 100%;
	outline: none;
	border-radius: 10px;
	border: 2px solid #e7e7e7;
	padding-left: 15px;
	font-size: 1rem;
	border-bottom-width: 2px;
	transition: 0.3s;
	background: transparent;
}

.wrapper form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
}

.wrapper form .inputfield .input:focus,
.wrapper form .inputfield .textarea:focus{
 border-color: #B775A6;;
}

.wrapper form .inputfield p{
   font-size: 14px;
   color: #757575;
}


.wrapper form .inputfield .btn{
    width: 100%;
    padding: 10px 20px;
    text-align: center;
    border: none;
    background: #B775A6;
    outline: none;
    border-radius: 30px;
    font-size: 20px;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
	display: block;
	margin-top: 20px;
}

.wrapper form .inputfield .btn:hover{
   transform: translateY(-5px);
    background:#782375;
}

.wrapper form .inputfield:last-child{
  margin-bottom: 0;
}


.login-register-text {
    color: #111;
    font-weight: 600;
	font-size: 1rem;
	text-align: center;
	margin-top: 25px;
}

.login-register-text a {
    text-decoration: none;
    color: #782375;
}
	</style>
</head>
<body>
	<div class="body">
	<div class="wrapper">
    <p class="login-text" style="font-size: 3rem; font-weight: 800; color: #782375" align="center">Register</p>
		
		<span style="color:red; font-size: 18px"><?php echo $message; ?></span><br>
		<span style="color:green; font-size: 18px"><?php echo $success; ?></span><br>
		<form action="" method="POST">
			<div class="inputfield">
				<label>Full Name</label>
				<input type="text" class="input" name="fname" placeholder="Enter your full name" required>
			</div>
			<div class="inputfield">
				<label>Username</label>
          		<input type="text" class="input" name="username" placeholder="Enter your username" required>
       		</div>  
       		<div class="inputfield">
          		<label>Password</label>
          		<input type="password" class="input" name="password" placeholder="Password must be 6 or more digits" required>
       		</div>  
      		<div class="inputfield">
         		<label>Confirm Password</label>
          		<input type="password" class="input" name="cpassword" placeholder="Confirm your password" required>
       		</div>  
        	<div class="inputfield">
          		<label>Email Address</label>
          		<input type="text" class="input" name="email" placeholder="Enter your email address" required>
       		</div> 
      		<div class="inputfield">
          		<label>Contact Number</label>
          		<input type="text" class="input" name="contact" placeholder="Enter your contact number" required>
       		</div> 
      		<div class="inputfield">
          		<label>Address</label>
          		<textarea class="textarea" id="address" name="address" placeholder="Enter your address" required></textarea>
       		</div>
			<div class="inputfield">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a> !</p>
    </form>
</div>
	</div>
</body>
</html>