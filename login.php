<?php
include("connect/config.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	
	$email = $_POST['email'];  
	$password = $_POST['password'];
	
	$loginquery ="SELECT * FROM users WHERE email='$email' AND password='".($password)."'"; 
	$result=mysqli_query($db, $loginquery);
	if($result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION["user_id"] = $row['user_id'];
		$success = "Successfully logged in!";
		header("refresh:1;url=index.php"); 
	}
	else
	{
		$message = "Invalid Email or Password!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Login</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
	
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
   display: flex;
   justify-content: center;
   align-items: center;
}
		html{
   font-size: 62.5%;
   overflow-x: hidden;
   scroll-behavior: smooth;
   scroll-padding-top: 6rem;
}

html::-webkit-scrollbar{
   width: 1rem;
}

html::-webkit-scrollbar-track{
   background-color: #fff;
}

html::-webkit-scrollbar-thumb{
   background-color: #B775A6;
}
	.body {
   width: 100%;
   min-height: 100vh;
   background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("../image/login-bg.jpg");
   background-position: center;
   background-size: cover;
   display: flex;
   justify-content: center;
   align-items: center;
}

.container {
    width: 400px;
    min-height: 400px;
    background: #FFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    padding: 40px 30px;
	text-align: center;
}

.container .login-text {
    color: #111;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}


.container .login-email .input-group {
    width: 100%;
    height: 50px;
    margin-bottom: 25px;
}

.container .login-email .input-group input {
    width: 100%;
    height: 100%;
    border: 2px solid #e7e7e7;
    padding: 15px 20px;
    font-size: 1.6rem;
    border-radius: 30px;
    background: transparent;
    outline: none;
    transition: .3s;
}

.container .login-email .input-group input:focus, .container .login-email .input-group input:valid {
    border-color: #B775A6;
}

.container .login-email .input-group .btn {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #B775A6;
    outline: none;
    border-radius: 30px;
    font-size: 2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
}

.container .login-email .input-group .btn:hover {
    transform: translateY(-5px);
    background:#782375;
}

/* login back_btn*/

.container .btn_2 {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #B775A6;
    outline: none;
    border-radius: 30px;
    font-size: 2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
}

.container .btn_2:hover {
    transform: translateY(-5px);
    background:#782375;
}
	.login-register-text {
    color: #111;
    font-weight: 600;
	font-size: 1.5rem;
	text-align: center;
	margin-top: 25px;
}

.login-register-text a {
    text-decoration: none;
    color: #782375;
}

/* media queries  */

@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}
	</style>
</head>
<body>
	<div class="body">
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 4rem; font-weight: 800; color: #782375">login</p>
			<span style="color:red; font-size: 18px;"><?php echo $message; ?></span>
			<span style="color:green; font-size: 18px;"><?php echo $success; ?></span>
   
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
				<a href="index.php"><button class="btn_2">Back</button></a>
	
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a> !</p>
	</div>
	</div>
</body>
</html>