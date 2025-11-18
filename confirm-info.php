<?php
include("connect/config.php");
error_reporting(0);
session_start();


if(empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
{
	header('location:login.php');
}
else
{
?>


<?php
if(isset($_POST['submit']))           //if upload btn is pressed
{
	if(strlen($_POST['contact']) < 10){
		$message = "Invalid phone number!";
	}
	else{
		$sql = "UPDATE users SET contact='$_POST[contact]',address='$_POST[address]' where user_id='{$_SESSION['user_id']}'";  
		mysqli_query($db, $sql); 
		move_uploaded_file($temp, $store);
		header("Location: checkout.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <title>Confirm Information</title>
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

   background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/header2.jpg");
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
  margin: 0px auto;
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



	</style>

	</head>

<body>

<section>
	<div class="wrapper">
    <p class="login-text" style="font-size: 2rem; font-weight: 800; color: #782375" align="center">Confirm your infomation</p>
		<p class="login-text" style="font-size: 16px; font-weight: 600; color:red" align="center">*Please make sure your shipping address is in Kuala Lumpur</p>
		
		 <span style="color:red; font-size: 18px"><?php echo $message; ?></span>
		  <span style="color:green; font-size: 18px"><?php echo $success; ?></span>
		<form action="" method="POST">
		<?php 
		$qml ="select * from users where user_id='{$_SESSION['user_id']}'";
		$rest=mysqli_query($db, $qml); 
		if(mysqli_num_rows($rest)>0){
			while($row = mysqli_fetch_assoc($rest)){
				?> 
		
        <div class="inputfield">
          <label>Username</label>
          <input readonly type="text" class="input" name="username" value="<?php echo $row['username']; ?>" style="background-color:#E7E7E7;">
       </div>
		
      <div class="inputfield">
          <label>Contact Number</label>
          <input type="text" class="input" name="contact" placeholder="Enter your contact number" value="<?php echo $row['contact']; ?>" required>
       </div> 
		
      <div class="inputfield">
          <label>Address</label>
		  <textarea class="textarea" id="address" name="address" placeholder="Enter your address" required><?php echo $row['address']; ?></textarea>
       </div> 
 <?php }}?>
		<div class="inputfield">
				<button name="submit" class="btn">Confirm</button>
			</div>
		</form>
	</div>
</section>
</body>
</html>
<?php
}
?>