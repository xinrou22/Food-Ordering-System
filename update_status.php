<?php
include("connect/config.php");
error_reporting(0);
session_start();


mysqli_query($db,"update users_orders set status='closed' where o_id='".$_GET['upd']."'");
header("location:your_orders.php");  

?>