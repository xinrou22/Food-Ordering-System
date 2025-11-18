<?php 
include "../connect/config.php";
error_reporting(0);
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
	*{
  margin: 0;
  padding: 0;
  list-style: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}

body{
  margin: 0;
  padding: 0;
  font-family: "Roboto", sans-serif;
}

.header{
  z-index: 1;
  background: #22242A;
  position: fixed;
  width: calc(100% - 0%);
  height: 70px;
  display: flex;
  top: 0;
}

.header .header-menu{
  width: calc(100% - 0%);
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
}

.header .header-menu .title{
  color: #fff;
  font-size: 25px;
  text-transform: uppercase;
  font-weight: 900;
}

.header .header-menu .title span{
  color: #4CCEE8;
}

.header .header-menu .sidebar-btn{
  color: #fff;
  position: absolute;
  margin-left: 240px;
  font-size: 22px;
  font-weight: 900;
  cursor: pointer;
  transition: 0.3s;
  transition-property: color;
}

.header .header-menu .sidebar-btn:hover{
  color: #4CCEE8;
}

.header .header-menu ul{
  display: flex;
}

.header .header-menu ul li a{
  background: #fff;
  color: #000;
  display: block;
  margin: 0 10px;
  font-size: 18px;
  width: 34px;
  height: 34px;
  line-height: 35px;
  text-align: center;
  border-radius: 50%;
  transition: 0.3s;
  transition-property: background, color;
}

.header .header-menu ul li a:hover{
  background: #4CCEE8;
  color: #fff;
}
.sidebar{
  z-index: 1;
  top: 0;
  background: #2f323a;
  margin-top: 70px;
  padding-top: 30px;
  position: fixed;
  left: 0;
  width: 250px;
  height: calc(100% - 9%);
  transition: all 0.5s ease;
}

#check:checked ~ .sidebar{
	width: 78px;
}

.sidebar .logo-details{
	height: 60px;
	width: 100%;
	display: flex;
	align-items: center;
}

.sidebar .logo-details .logo{
	font-size: 30px;
	color: #fff;
	height: 50px;
	min-width: 78px;
	text-align: center;
	line-height: 50px;
	cursor: pointer;
}

.sidebar .logo-details .logo_name{
	font-size: 22px;
	color: #fff;
	font-weight: 600;
	transition: 0.3s ease;
	transition-delay: 0.1s;
}

#check:checked ~ .sidebar .logo-details .logo_name{
	transition-delay: 0s;
	opacity: 0;
	pointer-events: none;
}

.sidebar .nav-links{
	padding-top: 30px;
	overflow: auto;
	margin-left: -32px;
}

#check:checked ~ .sidebar .nav-links{
	overflow: visible;
}

.sidebar .nav-links li{
	position: relative;
	list-style: none;
	transition: all 0.4s ease;
}

.sidebar .nav-links li:hover{
	background: #1d1b31;
}

.sidebar .nav-links li .icon-link{
	display: flex;
	align-items: center;
	justify-content: space-between;
}

#check:checked ~ .sidebar .nav-links li .icon-link{
	display: block;
}

.sidebar .nav-links li i{
	height: 50px;
	min-width: 78px;
	text-align: center;
	line-height: 50px;
	color: #fff;
	font-size: 20px;
	cursor: pointer;
	transition: all 0.3s ease;
}

.sidebar .nav-links li a{
	display: flex;
	align-items: center;
	text-decoration: none;
}

.sidebar .nav-links li a .link_name{
	font-size: 18px;
	font-weight: 400;
	color: #fff;
}

#check:checked ~ .sidebar .nav-links li a .link_name{
	opacity: 0;
	pointer-events: none;
}

.sidebar .nav-links li .sub-menu{
	padding: 6px 6px 14px 80px;
	margin-top: -10px;
	background: #1d1b31;
	display: none;
}

.sidebar .nav-links li.showMenu .sub-menu{
	display: block;
}

.sidebar .nav-links li .sub-menu a{
	color: #fff;
	font-size: 15px;
	padding: 5px 0;
	white-space: nowrap;
	opacity: 0.6;
	transition: all 0.3 ease;
}

.sidebar .nav-links li .sub-menu a:hover{
	opacity: 1;
}

#check:checked ~ .sidebar .nav-links li .sub-menu{
    position: absolute;
	left: 100%;
	top: -10px;
	margin-top: 0;
	padding: 10px 20px;
	border-radius: 0 6px 6px 0;
	opacity: 0;
	display: block;
	pointer-events: none;
	transition: 0s;
}

#check:checked ~ .sidebar .nav-links li:hover .sub-menu{
	top: 0;
	opacity: 1;
	pointer-events: auto;
	transition: all 0.4s ease;
}

.sidebar .nav-links li .sub-menu .link_name{
	display: none;
}

#check:checked ~ .sidebar .nav-links li .sub-menu .link_name{
	display: none;
}

#check:checked ~ .sidebar .nav-links li .sub-menu .link_name{
	font-size: 18px;
	opacity: 1;
	display: block;
}

.sidebar .nav-links li .sub-menu.blank{
	padding: 3px 20px 6px 16px;
	opacity: 0;
	pointer-events: none;
}

.sidebar .nav-links li:hover .sub-menu.blank{
	top: 50%;
	transform: translate(-50%);
}

.sidebar .profile-details{
	position: fixed;
	bottom: 0;
	width: 250px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	background: #1d1b31;
	padding: 6px 55px 6px 0;
	transition: all 0.5s ease;
}

#check:checked ~ .sidebar .profile-details{
	background: none;
}

#check:checked ~ .sidebar .profile-details{
	width: 78px;
}

.sidebar .profile-details .profile-comtent{
	display: flex;
	align-items: center;
}

.sidebar .profile-details img{
	height: 52px;
	width: 52px;
	object-fit: cover;
	border-radius: 16px;
	margin: 0 14px 0 12px;
	background: #1d1b31;
	transition: all 0.5s ease;
}

#check:checked ~ .sidebar .profile-details img{
	padding: 10px;
}

.sidebar .profile-details .profile_name, .sidebar .profile-details .profile_job{
	color: #fff;
	font-size: 18px;
	font-weight: 500;
	white-space: nowrap;
}

#check:checked ~ .sidebar .profile-details i, 
#check:checked ~ .sidebar .profile-details .profile_name, 
#check:checked ~ .sidebar .profile-details .profile_job{
	display: none;
}

.sidebar .profile-details .profile_job{
	font-size: 12px;
}

.content{
  width: calc(100% - 250px);
  margin-top: 60px;
  padding: 20px;
  margin-left: 250px;
  background-position: center;
  background-size: cover;
  height: 100vh;
  transition: 0.5s;
  background-color: #fff;
}

#check:checked ~ .content{
  margin-left: 60px;
}

#check:checked ~ .sidebar .profile_info{
  display: none;
}

#check{
  display: none;
}

.mobile_nav{
  display: none;
}


/* Responsive CSS */

@media screen and (max-width: 780px){
	
.header .header-menu .sidebar-btn{
	display: none;
}

.sidebar{
    display: none;
  }
	
#sidebar_btn{
    display: none;
  }

.content{
    margin-left: 0;
    margin-top: 0;
    padding: 10px 20px;
    transition: 0s;
  }

#check:checked ~ .content{
    margin-left: 0;
  }

.mobile_nav{
    display: block;
    width: calc(100% - 0%);
  }

.nav_bar{
    background: #222;
    width: calc(100% - 0px);
    margin-top: 70px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }

.nav_bar .mobile_profile_image{
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

.nav_bar .nav_btn{
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    transition: 0.5s;
    transition-property: color;
  }

.nav_bar .nav_btn:hover{
    color: #19B3D3;
  }

.mobile_nav_items{
    background: #2F323A;
    display: none;
  }

.mobile_nav_items a{
    color: #fff;
    display: block;
    text-align: center;
    letter-spacing: 1px;
    line-height: 60px;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
    transition-property: background;
  }

.mobile_nav_items a:hover{
    background: #19B3D3;
  }

.mobile_nav_items i{
    padding-right: 10px;
  }

.active{
    display: block;
  }
}


/*Content*/

.content .subtitle-name
{
	color: #11101d;
    font-size: 20px;
    font-weight: 800;
	padding: 10px 0 10px 0;
	margin: 15px;
}

/*Add buttom*/
.content .add
{
	color: white;
	background-color: #578FFF;
	text-decoration: none;
	padding: 10px;
	font-size: 18px;
	font-weight: 600;
	border-radius: 10px;
	transition: all .4s ease;
	margin: 15px;
}

.content .add:hover
{
	color: white;
	background-color: #003B96;
}

	
	</style>
</head>

<body>


 <input type="checkbox" id="check">
    <!--header area start-->  
	  <div class="header">
                <div class="header-menu">
                    <div class="title">Admin <span>Panel</span></div>
                    <label for="check" class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </label>
                    <ul>
                        <li><a href="AdminLogout.php"><i class="fas fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
		
      <div class="nav_bar">
        <img src="img/user.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="AdminDashboard.php"><i class='bx bx-grid-alt'></i><span>Dashboard</span></a>
        <a href="AdminCategory.php"><i class='bx bx-collection' ></i><span>Category</span></a>
        <a href="AdminProduct.php"><i class='bx bx-food-menu' ></i><span>Product</span></a>
        <a href="AdminOrder.php"><i class='bx bx-group'></i><span>Order</span></a>
        <a href="AdminUser.php"><i class='bx bx-user'></i><span>User</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
<div class="sidebar">
	<div class="logo-details">
		<div class="logo">
			<img src="img/logo.png" style="width: 50px" height="50px">
		</div>
			<span class="logo_name">Purple Pig</span>
	</div>
	
	<ul class="nav-links">
		<li>
			<a href="AdminDashboard.php">
				<i class='bx bx-grid-alt'></i>
				<span class="link_name">Dashboard</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="AdminDashboard.php">Dashboard</a></li>
			</ul>
		</li>
			
		<li>
			<div class="icon-link">
				<a href="AdminCategory.php">
					<i class='bx bx-collection' ></i>
					<span class="link_name">Category</span>
				</a>
			</div>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="AdminCategory.php">Category</a></li>
			</ul>
		</li>
			
		<li>
			<div class="icon-link">
			<a href="AdminProduct.php">
				<i class='bx bx-food-menu' ></i>
				<span class="link_name">Product</span>
			</a>
			</div>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="AdminProduct.php">Product</a></li>
			</ul>
		</li>
			
		<li>
			<a href="AdminOrder.php">
				<i class='bx bx-group'></i>
				<span class="link_name">Order</span>
			</a>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="AdminOrder.php">Order</a></li>
			</ul>
		</li>
			
		<li>
			<div class="icon-link">
				<a href="AdminUser.php">
					<i class='bx bx-user'></i>
					<span class="link_name">User</span>
				</a>
			</div>
			<ul class="sub-menu blank">
				<li><a class="link_name" href="AdminUser.php">User</a></li>
			</ul>
		</li>
		
		
		<li>
			<div class="profile-details">
				<div class="profile-content">
					<img src="img/user.png" alt="profile">
				</div>
				<div class="name-job">
					<div class="profile_name"><?php echo $_SESSION['username']; ?></div>
					<div class="profile_job">Admin</div>
				</div>
				<a href="AdminLogout.php"><i class='bx bx-log-out' ></i></a>
			</div>
		</li>
		
	</ul>
</div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
    <!--sidebar end-->
</body>
</html>