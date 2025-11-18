<style type="text/css">
	nav{
		height: 80px;
		background: #000000;
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 0px 50px 0px 100px;
	}
	nav .logo{
		font-size: 33px;
		color: #FFFFFF;
		font-weight: 800;
	}
	
	nav .logo span{
		color: blueviolet;
	}
	nav ul{
		display: flex;
		list-style: none;
	}
	nav ul li{
		margin: 0 15px;
	}
	
	nav ul li a{
		color: #FFFFFF;
		text-decoration: none;
		font-size: 18px;
		font-weight: 500;
		letter-spacing: 1px;
		padding: 8px 10px;
		border-radius: 5px;
		transition: all 0.3s ease;
	}
	
	nav ul li a:hover{
		color:#1b1b1b;
		background: #FFFFFF;
	}
	
	nav .menu-btn i{
		color: #fff;
		font-size: 22px;
		cursor: pointer;
		display: none;
	}
	
	#click{
			display: none;
		}
	
	@media (max-width: 940px){
		nav .menu-btn i{
		display: block;
	}
		nav ul{
			position: fixed;
			background: #000000;
			top: 80px;
			left: -100%;
			height: 100vh;
			width: 100%;
			display: block;
			text-align: center;
			transition: all 0.3s ease;
		}
		
		#click:checked ~ ul{
			left: 0%;
		}
		
		
		#click:checked ~ .menu-btn i:before{
			content:"\f00d";
		}
		
		nav ul li{
			margin: 40px 0;
		}
		
		nav ul li a{
			font-size: 20px;
			display: block;
		}
		
		nav ul li a:hover{
		color:blueviolet;
		background: none;
	}
	
	}



</style>

<nav>
	<div class="logo"><img class="img-rounded" src="images/logo.png" width="50px" height="50px" alt="">  <span>Purple</span> Pig</div>
	<input type="checkbox" id="click">
	<label for="click" class="menu-btn"><i class="fas fa-bars"></i></label>
	<ul>
		<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li><a href="index.php">Home</a></li>';
								echo '<li><a href="category.php">Categories</a></li>';
								echo '<li><a href="login.php">Login/Signup</a></li>';
							}
						else
							{
								echo '<li><a href="index.php">Home</a></li>';
								echo '<li><a href="category.php">Categories</a></li>';
								echo  '<li><a href="your_orders.php">Orders</a> </li>';
								echo  '<li><a href="profile.php">Profile</a> </li>';
								echo  '<li><a href="logout.php">Logout</a> </li>';
							}
		?>
	</ul>
</nav>