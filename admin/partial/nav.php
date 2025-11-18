<?php 
include("../connect/config.php");

error_reporting(0);
session_start();
if(empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
{
	header('location:index.php');
}

?>
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