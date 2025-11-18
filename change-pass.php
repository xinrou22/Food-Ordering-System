<?php
include("connect/config.php");
error_reporting(0);
session_start();
?>


<?php
if(isset($_POST['submit']))           
{
	$oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $cpass = $_POST['cpassword'];
	
	$sql = "SELECT password FROM users WHERE password = '$oldpass'";
    $result = mysqli_query($db, $sql);
	
	if(mysqli_num_rows($result) > 0) {
	
		if($newpass != $cpass)
		{  //matching passwords
       	$message = "Password does not match";
		}
		elseif(strlen($newpass) < 6) 
		{
		$message = "Password must be 6 digits or more than 6.";
		}else{
			$sql = "UPDATE users SET password='$newpass' where user_id='{$_SESSION['user_id']}'";  
			mysqli_query($db, $sql); 
			move_uploaded_file($temp, $store);
			  
			$success = 	'Update completed';
			header("refresh:1;url=profile.php");
		}
	}else { $message = "You've entered a wrong old password."; }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <title>Change Password</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ff0f2d874b.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 
	
	<!--page-icon------------>
    <link rel="shortcut icon" href="images/pg-logo.png">
	
<style type="text/css">

body {

   background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/login-bg.jpg");
   background-position: center;
   background-size: cover;
   justify-content: center;
   align-items: center;
}
	
	section{
		padding: 5rem 10%;
	}

.wrapper{
  max-width: 700px;
  width: 100%;
  background: #fff;
  margin: 50px auto;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.125);
  padding: 50px;
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

.wrapper .btn_2 {
    width: 100%;
    padding: 10px 20px;
    text-align: center;
    border: none;
    background:#FC5353;
    outline: none;
    border-radius: 30px;
    font-size: 20px;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
	display: block;
	margin-top: 20px;
}

.wrapper .btn_2:hover {
    transform: translateY(-5px);
    background:#FF0037;
}
	.login-register-text {
    color: #111;
    font-weight: 600;
	font-size: 1.5rem;
	text-align: center;
	margin-top: 25px;
}


	</style>

	</head>

<body>
    
	<!--navbar-->
	<?php include'nav.php' ?>
<section>
	<div class="wrapper">
    <p class="login-text" style="font-size: 2rem; font-weight: 800; color: #782375" align="center">Change Password</p>
		 <span style="color:red; font-size: 18px"><?php echo $message; ?></span>
		  <span style="color:green; font-size: 18px"><?php echo $success; ?></span>
		
    <form action="" method="POST">
		
		
       <div class="inputfield">
          <label>Current Password</label>
          <input type="password" class="input" name="oldpassword" placeholder="Enter your current password" required>
       </div>  
		
	 <div class="inputfield">
          <label>New Password</label>
          <input type="password" class="input" name="newpassword" placeholder="Password must be 6 or more digits" required>
       </div>
		
	<div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" class="input" name="cpassword" placeholder="Confirm your new password" required>
       </div>
 
		<div class="inputfield">
				<button name="submit" class="btn">Save</button>
			</div>
		</form>
		<a href="profile.php"><button class="btn_2">Cancel</button></a>
	</div>
</section>

</body>
</html>